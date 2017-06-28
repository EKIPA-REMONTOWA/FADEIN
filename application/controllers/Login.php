<?php

class Login extends CI_Controller {
	public $profLicznik = 0;
	
	function index()
	{
		if(isset($this->session->is_logged_in)){
			redirect('zalogowany');
		}
		$this->load->view('header');
		$this->load->view('login_form');
		$this->load->view('footer');
	}
	
	function validate_credentials()
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		$zalogowany_id = $this->membership_model->check_logged_in_user_id($this->input->post('username'));
		
		if($query) // Logowanie poprawne
		{
			// konto jest aktwowane
			if($this->membership_model->is_user_active($this->input->post('username'))){
				$data = array(
					'username' => $this->input->post('username'),
					'user_id' => $zalogowany_id['id_user'],
					'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				redirect('zalogowany');
			}
			// Konto nie jest aktywowane
			else{
				echo "Sprawdz swojego maila i aktywuj konto!";
			}
			
			
		}
		else //Logowanie niepoprawne
		{
			$this->index();
			echo 'Login lub hasło niepoprawne';
		}
	}	
	function signup() //Kontroler dodawania nowego użytkownika.
	{
		$this->load->view('header');
		$this->load->view('signup_form');
		$this->load->view('footer');
	} 
	
	function create_member() //Kontroler tworzenia użytkownika
	{	//ładowanie biblioteki walidacji formularzy i przeprowadzenie jej z poniższymi zadasami
		$this->load->library('form_validation');
		//zasady walidacji
		$this->form_validation->set_rules('first_name', 'Imię', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('last_name', 'Nazwisko', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('email', 'Adres email', 'trim|required|valid_email|max_length[32]|callback_check_if_email_exists');
		$this->form_validation->set_rules('username', 'Nazwa użytkownika', 'trim|required|min_length[4]|max_length[15]|callback_check_if_username_exists');
		$this->form_validation->set_rules('password', 'Hasło', 'trim|required|min_length[8]|max_length[32]|callback_check_regex');
		$this->form_validation->set_rules('password_confirm', 'Potwierdzenie hasła', 'trim|required|matches[password]');
		$this->form_validation->set_rules('prof1', 'Profesja1', 'trim|callback_check_professions');
		$this->form_validation->set_rules('prof2', 'Profesja2', 'trim|callback_check_professions');
		$this->form_validation->set_rules('prof3', 'Profesja3', 'trim|callback_check_professions|callback_check_licznik');
		
		if ($this->form_validation->run() == FALSE) //walidacja spierdolona
		{
			$this->load->view('header');
			$this->load->view('signup_form');
			$this->load->view('footer');
		}
		else
		{
			//Ładujemy model membership i wywołujemy jego metodę create_member
			$this->load->model('membership_model');
			if ($query = $this->membership_model->create_member())
			{
				$data['account_created'] = 'Twoje konto zostało utworzone.';
				
				$data = array(
				
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'activation_key' => $this->membership_model->get_activation_key($this->input->post('username'))
					
				);
				
				$this->membership_model->send_activation_email($data);
				
				$this->load->view('header');
				$this->load->view('login_form', $data);
				$this->load->view('footer');
				
			}
			else {
				$this->load->view('header');
				$this->load->view('signup_form');
				$this->load->view('footer');
			}
		}
	}
	
	//funkcja sprawdzająca czy nie istnieje już użytkownik o takiej samej nazwie
	function check_if_username_exists($requested_username) {
		$this->load->model('membership_model');
		$username_available = $this->membership_model->check_if_username_exists($requested_username);
		if ($username_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	//analogicznie sprawdzenie istnienia konfliktu maili...
	function check_if_email_exists($requested_email) {
		$this->load->model('membership_model');
		$email_available = $this->membership_model->check_if_email_exists($requested_email);
		if ($email_available) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	//RegulLar expressions check.
	//Innymi słowy czy w haśle znajduje się np.0-9,Aa-Zz,+znak specjalny
	//Adnotacja.. jestem zjebany CI ma wbudowaną klasę do regex... kij, koło na nowo jak to mówią xD
	function check_regex($requested_password) {
		$this->load->model('membership_model');
		$chars = $this->membership_model->check_regex($requested_password);
		if ($chars) {
			return true;
		} else {
			return false;
		}
	}
	//Funkcja sprawdzająca poprawność podanych profesji.
	function check_professions($requested_profession) {
		if(strlen($requested_profession) < 1) {
			return true;
		} else {
			$this->load->model('membership_model');
			$profesja = $this->membership_model->check_professions($requested_profession);
			if($profesja) {
				$this->profLicznik++;
				return true;
			} else {
				return false;
			}
		}
	}
	function check_licznik() {
		if ($this->profLicznik == 0) {
			return false;
		} else {
			return true;
		}
	}
}
?>