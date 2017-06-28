<?php
	if(!defined('BASEPATH'))
	{
	exit('No direct script access allowed');
	}

	class Poczta extends CI_Controller {
		
		function __construct(){
			parent::__construct();
			if(NULL == $this->session->is_logged_in){
				redirect('login');
			}
		}
		
		function index() {
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('poczta/mailbox_start');
			$this->load->view('poczta/mailbox_menu');
			$this->load->view('poczta/mailbox_end');
			$this->load->view('footer');
		}
		
		function nowa_wiadomosc() {
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('poczta/mailbox_start');
			$this->load->view('poczta/mailbox_menu');
			$this->load->view('poczta/mailbox_nowa_wiadomosc');
			$this->load->view('poczta/mailbox_end');
			$this->load->view('footer');
		}
		
		function dodaj_znajomego() {
			$input_id = $this->input->post('id_user');
			$this->output->set_output(json_encode($input_id));
		}
		
		function wyslij_wiadomosc() {
			$title = $this->input->post['message_title'];
			$content = $this->input->post['message_data'];
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('message_title', 'message_title', 'trim|required|min_length[3]|max_length[255]');
			$this->form_validation->set_rules('message_data', 'message_data', 'trim|required|min_length[3]');
			
			if ($this->form_validation->run() == FALSE) //walidacja spierdolona
			{
				redirect('Poczta/nowa_wiadomosc');
			}
			else
			{
				
			}
			
		}
	}
?>