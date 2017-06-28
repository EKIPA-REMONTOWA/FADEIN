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
			$this->load->view("user_info",$info);
		}
		else{
			redirect('/login');
		}	
	}
	
	function zmien_haslo(){
		// jeśli użytkownik jest zalogowany
		if(NULL !== $this->session->is_logged_in){
			//ładowanie biblioteki walidacji formularzy i przeprowadzenie jej z poniższymi zadasami
			
			$this->load->model('membership_model');
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password', 'Hasło', 'trim|required|min_length[8]|max_length[32]|callback_check_regex');
			$this->form_validation->set_rules('password_confirm', 'Potwierdzenie hasła', 'trim|required|matches[password]');
			// jeśli zainicjowano zmiane hasła
			if(NULL !== $this->input->post("change_submit")){
				// jeśli walidacja się nie powiodła
				if($this->form_validation->run() == FALSE){
					// załaduj widok z błędem
					$this->load->view("password_change");
				}
				//jeśli walidacja się powiodła
				else{
					$this->load->library('encrypt');
					$data = array ("password" => hash("sha512" ,$this->input->post("password")));
					// Jeśli zmiana hasła się powiodła
					if($this->membership_model->change_password($this->session->user_id,$data)){
						redirect("zalogowany");
					}
					else{
						$error = "Problemy z bazą danych, Prosimy o kontakt z administratorem<br/>";
						$this->load->view("password_change",$error);
					}
					
				}
			}
			// jeśli nie zainicjowano zmiany hasła
			else{
				// wyświetl widok zmiany hasła bez błędów
				$this->load->view("password_change");
			}
		}
		else{
			redirect('/login');
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
				print_r($this->input->post);
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