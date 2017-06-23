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
			$this->form_validation->set_rules('password', 'Hasło', 'trim|required|min_length[8]|max_length[32]');
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
}
?>