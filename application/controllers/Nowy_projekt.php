<?php 

class Nowy_projekt extends CI_Controller {

    function index(){
        
        $this->load->view('header');
        $this->load->view('new_projects_succes');
        $this->load->view('footer');
    }
}

?>