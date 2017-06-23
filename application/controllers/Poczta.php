<?php
	class Poczta extends CI_Controller {
		
		function __construct(){
			parent::__construct();
			if(NULL == $this->session->is_logged_in){
				redirect('/login');
			}
		}
	}
?>