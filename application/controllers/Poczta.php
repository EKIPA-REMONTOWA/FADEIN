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
			$this->load->library('form_validation');
			$this->form_validation->set_rules('message_to', 'Adresat', 'trim|required|min_length[4]|max_length[32]|callback_check_if_recipient_exists');
			$this->form_validation->set_rules('message_title', 'Tytuł wiadomości', 'trim|required|min_length[3]|max_length[255]');
			$this->form_validation->set_rules('message_data', 'Treść wiadomości', 'trim|required|min_length[3]');
			
			$recipient = $this->input->post('message_to');
			$title = $this->input->post('message_title');
			$content = $this->input->post('message_data');
			$nadawca = $this->session->user_id;
			
			$this->load->model('poczta_model');
			$id_odbiorcy = $this->poczta_model->ustal_id_odbiorcy($recipient);
			
			if ($this->form_validation->run() == FALSE) //walidacja spierdolona
			{
				$this->load->view('header');
				$this->load->view('menu');
				$this->load->view('poczta/mailbox_start');
				$this->load->view('poczta/mailbox_menu');
				$this->load->view('poczta/mailbox_nowa_wiadomosc');
				$this->load->view('poczta/mailbox_end');
				$this->load->view('footer');
			}
			else
			{
				$dane = array('msg_from' => $nadawca,
							  'msg_to' => $id_odbiorcy['id_user'],
							  'msg_time' => time(),
							  'msg_title' => $title,
							  'msg_data' => $content,
							  'msg_type' => 0
							 );
				if($this->poczta_model->wstaw_msg_do_bazy($dane)) {
					
					$data = array("msg" => "Twoja wiadomosć została wysłana");
					
					$this->load->view('header');
					$this->load->view('menu');
					$this->load->view('poczta/mailbox_start');
					$this->load->view('poczta/mailbox_menu');
					$this->load->view('poczta/mailbox_nowa_wiadomosc', $data);
					$this->load->view('poczta/mailbox_end');
					$this->load->view('footer');
				}
			}
			
		}
		
		function check_if_recipient_exists($requested_username) {
			$this->load->model('membership_model');
			$username_available = $this->membership_model->check_if_username_exists($requested_username);
			if ($username_available) {
				return FALSE;
			} else {
				return TRUE;
			}
			
		}
	}
?>