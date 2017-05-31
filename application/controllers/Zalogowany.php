<?php

class Zalogowany extends CI_Controller {
	
	function panel()
	{
		if(!isset($this->session->is_logged_in)){
			redirect('/login');
		}
		echo 'nazwa użytkownika=  '.$this->session->username;
		echo '<br>';
		echo 'zmienna stanu zalogowania=  '.$this->session->is_logged_in;
		$this->load->view('menu');
	}
	
	function wyloguj()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}
	
}
?>