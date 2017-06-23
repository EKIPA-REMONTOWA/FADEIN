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
	
    
}
?>