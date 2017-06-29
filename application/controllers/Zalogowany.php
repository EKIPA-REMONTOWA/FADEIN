<?php

class Zalogowany extends CI_Controller {
  
	function index()
	{
        // Jeśli użytkownik nie jest zalogowany
		if(!isset($this->session->is_logged_in)){
            // przenieś do formulaża logowania
			redirect('/login');
		}
        // Załaduj widok z panelem kontrolnym użytkownika
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('footer');		
	}
	
	function wyloguj()
	{
        // Zniszcz sesję
		$this->session->sess_destroy();
        // Przenieś do fomulaża logowania
		redirect('/login');
	}
	
	//Przekierowanie do odpowiedzniej kategorii wyszukiwania.
	function result() {
		$argument_szukania = $this->input->post('argument_szukania');
		$kat_szukania = $this->input->post('kategoria_szukania');
		$zmiennaSzukania = $this->input->post('zmiennaSzukania');
		switch($zmiennaSzukania) {
			//Jeśli szukamy użytkownika
			case '0':
				if($kat_szukania == 0) {
					redirect(base_url().'rezultat/index/u/'.$argument_szukania);
				}
				else if ($kat_szukania == 1) {
					redirect(base_url().'rezultat/index/c/'.$argument_szukania);
				}
				else if ($kat_szukania == 2) {
					redirect(base_url().'rezultat/index/f/'.$argument_szukania);
				}
				else if ($kat_szukania == 3) {
					redirect(base_url().'rezultat/index/l/'.$argument_szukania);
				}
				else {
					show_404();
				}
			break;
			//Jeśli szukamy projektu
			case '1':
				if($kat_szukania == 0) {
				redirect(base_url().'rezultat/index/t/'.$argument_szukania);
				}
				else if ($kat_szukania == 1) {
					redirect(base_url().'rezultat/index/a/'.$argument_szukania);
				}
				else if ($kat_szukania == 2) {
					redirect(base_url().'rezultat/index/g/'.$argument_szukania);
				}
				else {
					show_404();
				}
			break;
		}
	}
	function panel($id){
		// Jeśli użytkownik jest zalogowany
		if(NULL !== $this->session->is_logged_in){
			// załaduj model opowiedzialny za userów
			$this->load->model("membership_model");
			//  wyciągnij dane o userze o podanym id
			$info = $this->membership_model->get_user_info($id);
			// załaduj widok z danymi usera
			$this->load->view("user/user_info",$info);
		}
		else{
			redirect('/login');
		}	
	}
	
	function zmien_haslo(){
		// jeśli użytkownik nie jest zalogowany
		if(NULL == $this->session->is_logged_in){
			// przenieś go do widoku logowania
			redirect('/login');
		}
		// Ładuj model odpowiedzialny za userów
		$this->load->model("membership_model");
		
		// Jeśli użytkownik nie wysłał danych z formulaża potwierdzenia starego hasła
		if(null == $this->input->post("password_validation") and null == $this->input->post("change_password")){
			$this->load->view("user/old_password");
		}
		// Jeśli użytkownk wysłał dane z formulaża potwierdzenia starego hasła
		else{
			//skróć nazwy zmiennych
			$password1 = $this->input->post("password1");
			$password2 = $this->input->post("password2");
			// jeśli podane hasła nie są identyczne
			if($password1 !== $password2 and null == $this->input->post("change_password")){
				$data["error"] = "Podane hasła nie są identyczne";
				$this->load->view("user/old_password",$data);
			}
			// jeśli podane hasła są identyczne ale nie są przypisane do zalogowanego konta
			elseif(!$this->membership_model->match_password($password1,$this->session->user_id) and null == $this->input->post("change_password")){
				$data["error"] = "Niepoprawne hasło";
				$this->load->view("user/old_password",$data);
			}
			// jeśli podane hasła spełniają wszystkie kryteria
			else{
				//ładuj biblioteki walidacji formularzy i jej zasad
				$this->load->library('form_validation');
				$this->form_validation->set_rules('new_password1', 'Nowe hasło', 'trim|required|min_length[8]|max_length[32]|callback_check_regex');
				$this->form_validation->set_rules('new_password2', 'Potwierdzenie hasła', 'trim|required|matches[new_password1]');
				
				// skróć nazwy zmiennych
				$new_password1 = $this->input->post("new_password1");
				$new_password2 = $this->input->post("new_password2");
				// jeśli użytkownik nie wysłał danych z nowymi hasłami dla konta z formulaza
				if(null == $this->input->post("change_password")){
					$this->load->view("user/new_password");
				}
				// jeśli użytkownik wysłał dane z nowymi hasami dla konta z formulaża ale są one nie zgodne z walidacją
				else{
					// jeśli walidacja się nie powiodła
					if ($this->form_validation->run() == FALSE){
						$this->load->view('header');
						$this->load->view('user/new_password');
						$this->load->view('footer');
					}
					// jeśli walidacja się powiodła ale nowe hasło jest tkie samo jak stare
					elseif($this->membership_model->match_password($new_password1,$this->session->user_id)){
						$data["error"] = "Nowe hasło nie może być takie samo jak stare!";
						$this->load->view('header');
						$this->load->view('user/new_password',$data);
						$this->load->view('footer');
					}
					// jeśli walidacja nowego hasła zakończyła sie pomyślnie!
					else{
						$data= array(
							"id" => $this->session->user_id,
							"password" => hash('sha512', $new_password1)
						);
						if($this->membership_model->change_password($data)){
							$this->session->set_flashdata("alert", "Twoje hasło zostało zmienione");
							redirect("zalogowany");
						}
						else{
							$data["error"] = "Problemy z bazą danych, Prosimy o kontakt z administratorem";
							$this->load->view("user/new_password");
						}
					}
				}
			}
		}
	}

	
	function check_regex($requested_password) {
		$this->load->model('membership_model');
		$chars = $this->membership_model->check_regex($requested_password);
		if ($chars) {
			return true;
		} else {
			return false;
		}
	}
	
	function aktywuj_konto($username=FALSE,$key=FALSE){
		// Jeśli użytkownik chce aktywować konto za pomocą linka z maila
		if(NULL == $this->input->post("activate_account")){
			// załaduj model odpowiedzialny za userów
			$this->load->model("membership_model");
			// spakuj dane podane w linku do tablicy
			$data = array(
				"id" => $this->membership_model->check_logged_in_user_id($username)["id_user"],
				"activation_key" => $key
			);
			// Jeśli za pomocą danych zawartych w linku aktywacja się udała
			if ($this->membership_model->activate_account($data)){
				// Stwórz dane sesyjne umożliwiające automatyczne logowanie
				$data = array(
					'username' => $username,
					'user_id' => $this->membership_model->check_logged_in_user_id($username)["id_user"],
					'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				// Przenieś do panelu głównego
				redirect('zalogowany');
			} 
			// Jeśli aktywacja się nie udała
			else {
				// załaduj widok pozwalający na ponowne wysłanie linku aktywacyjnego
				$this->load->view("account_activation/manual_activation");
			}
		}
		// jeśi użytkownik manualnie wpisał adres email aby ponownie wysłać link
		else{
			// załaduj model odpowiedzialny za userów
			$this->load->model("membership_model");
			// jeśli podany adres email I  istnieje w bazie danych
			if($this->membership_model->check_if_email_exist($this->input->post("email")) && !$this->membership_model->check_if_username_exists($this->input->post("username"))){
				// Przygotuj dane do wysłania maila aktywacyjnego
				$username = $this->input->post("username");
				$email = $this->input->post("email");
				$key = $this->membership_model->get_activation_key($username);
				$data = array(
					"email" => $email,
					"username" => $username,
					"activation_key"=> $key 
				);
				// Wyślij maila aktywacyjnego
				$this->membership_model->send_activation_email($data);
				// Załaduj powiadomienie o wysłaniu maila
				$data["mesg"] = "Link aktywacyjny został wysłany na podany adres email!";
				$this->load->view("account_activation/manual_activation",$data);
			}
			// jeśli podany adres email nie istnieje w bazie danych
			else{
				// Załaduj powiadomienie o błędej walidacji
				$data["mesg"] = "Podany email lub Login nie istnieje w bazie danych";
				$this->load->view("account_activation/manual_activation",$data);
			}
		}
	}
}
?>