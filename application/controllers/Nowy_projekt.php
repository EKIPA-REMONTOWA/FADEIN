<?php 

class Nowy_projekt extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(NULL == $this->session->is_logged_in){
			redirect('login');
		}
	}
	
    function index(){
        
        $this->load->view('header');
		$this->load->view('menu');
        $this->load->view('new_projects_succes');
        $this->load->view('footer');
    }
}

?>