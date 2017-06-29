<?php
//Inicjujemy model.
class Membership_model extends CI_Model {
	
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$password_hashed = hash('sha512', $this->input->post('password'));
		$this->db->where('password', $password_hashed);
		$query = $this->db->get('users');
		if($query->num_rows() == 1) {
			return true;
		}
	}
	//Funkcja sprawdzająca id zalogowanego użytkownika
	function check_logged_in_user_id($requested_username) {
		$this->db->select('id_user');
		$this->db->where('username', $requested_username);
		$zapytanie = $this->db->get('users');
		return $zapytanie->row_array();
	}
	
	function is_user_active($username){
		$this->db->select("active"); // Wyciągnij dane o aktywacji konta
		$this->db->from("users"); // z tabeli "users"
		$this->db->where("username", $username); // gdzie nazwa usera jest równe podanemu w bazie danych
		// Wykonaj zapytanie
		$query = $this->db->get();
		// Zwróć wynik
		$result =  $query->result();
		
		return $result[0]->active;
	}
	
	function create_member() {
		//Ładujemy login do zmiennej
		$username = $this->input->post('username');
		//Klasa nowego użytkownika
		
		$token = hash('ripemd160',rand(1000,5000).$this->input->post('email'));
		
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'profesja1' => $this->input->post('prof1'),
			'profesja2' => $this->input->post('prof2'),
			'profesja3' => $this->input->post('prof3'),
			'username' => $this->input->post('username'),
			'password' => hash('sha512',($this->input->post('password'))),
			'active' => 0,
			'activation_key' => $token
		);
		//Wysyłamy do bazy danych!!!
		$insert = $this->db->insert('users', $new_member_insert_data);
		//I zwracamy cośmy dostali, jak to mówią kto daje i zabiera ten się w piekle poniewiera xD
		
		//Tworzymy folder użytkownika
		mkdir("./uploads/".$this->check_logged_in_user_id($this->input->post('username'))["id_user"], 777);
		
		return $insert;
		
		
	}
	//Funkcja z parametrem wysyłanym do kontrolera.
	function check_if_username_exists($username) {
		//Łączymy się z bazą
		$this->db->where('username', $username);
		//i wyjmujemy...
		$result = $this->db->get('users');
		
		//Dodatni wynik konfliktów
		if ($result->num_rows() > 0) {
			return FALSE; //login zajęty
		} else {
		//Zerowy wynik konfliktów
			return TRUE; //login wolny
		}
		
	}
	//i tuteż to samo co dla username'a.
	function check_if_email_exists($email) {
		$this->db->where('email', $email);
		$result = $this->db->get('users');
		
		if ($result->num_rows() > 0) {
			return FALSE; //login zajęty
		} else {
			return TRUE; //login wolny
		}
		
	}
	//Sprawdzanie czy hasło posiada znak specjalny duże i małe litery oraz cyfry.
	function check_regex($requested_password) {
		$rules = ['/[A-Z]/','/[a-z]/','/[0-9]/','/[\!\@\#\$\%\^\&\*]/'];
		foreach ($rules as &$rule) {
			if(preg_match_all($rule, $requested_password, $matches, PREG_SET_ORDER, 0)) {
				$rule = true;
			};
		}
		$rule_points_counter = 0;
		foreach ($rules as $value) {
			if($value === true) {
				$rule_points_counter++;
			} else {
				return false;
			}
		}
		if($rule_points_counter===4){
			return true;
		}
	}

	function check_professions($requested_profession) {
		$this->db->where('profession', $requested_profession);
		$result = $this->db->get('professions');
		if($result->num_rows() == 0) {
			return false;
		} else {
			return true;
		}
	}
	
	function get_user_info($id){
		$this->db->select("email, username, first_name, last_name, profesja1, profesja2, profesja3"); // Wyciągnij wszystkie dane
		$this->db->from("users"); // z tabeli "users"
		$this->db->where("id_user", $id); // gdzie id usera jest równe podanemu id
		// Wykonaj zapytanie
		$query = $this->db->get();
		// Zwróć wynik
		return $query->result();
	}
	
	function change_password($data){
		extract($data);
		$this->db->where('id_user', $id); 
		if($this->db->update('users',array("password" => $password))){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	/* 
		Funkcja wysyła maila aktywacyjnego na podany adre email.
		Oczekuje tablicy asocjacyjnej o podanych indeksach indeksach wraz z odpowiednimi danymi:
		-email
		-username
		-activation_key (powinien być w bazie danych w tabeli users w odpowiedniej kolumnie)
		w przypadku porażki zwraca FALSE w przypadku sukcesu zwraca TRUE
	*/
	function send_activation_email($data){
		$to = $data["email"];
		$subject = "Aktywuj swoje konto na Fadein.pl";
		$activation_link = base_url()."zalogowany/aktywuj_konto/".$data['username']."/".$data['activation_key'];
		
		$this->load->library('email');
		
		$this->email->from('fadein.pl', 'Fadein Team');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message(
			"Link aktywacyjny do konta o loginie: ".$data['username']."\r\n\r\nDziękujemy za zainteresowanie naszą witryną\r\n\r\n".$activation_link
		);
		
		$this->email->send();
	}
	
	function get_activation_key($username){
		$this->db->select("activation_key"); // wyciągnij klucz aktywacji
		$this->db->from("users"); // z tabeli "users"
		$this->db->where("username", $username); // gdzie nazwa użytkownika usera jest równe podanemu
		
		$query = $this->db->get();
		$result = $query->result();
		return $result[0]->activation_key;
	}
	
	function activate_account($data){
		$this->db->select("activation_key");
		$this->db->from("users");
		$this->db->where("id_user", $data['id']);
		
		$query = $this->db->get();
		$result = $query->result();
		
		$active = array("active" => 1);
		
		if($result[0]->activation_key == $data["activation_key"]){
			$this->db->where('id_user', $data['id']);
			$this->db->update('users',$active);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	function check_if_email_exist($email){
		$this->db->select("email");
		$this->db->from("users");
		$this->db->where("email", $email);
		
		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return true;
		}
		else{
			return false;
		}
		
	}
	function match_password($password,$id){
		
		$this->db->select("password");
		$this->db->from("users");
		$this->db->where("id_user",$id);
		
		$query = $this->db->get();
		$user_password = $query->result()[0]->password;
		
		if($user_password == hash('sha512', $password)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}
?>