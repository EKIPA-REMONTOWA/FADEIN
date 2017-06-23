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
	
    function nowy_projekt(){  
        
        // Jeśli użytkownik jest zalogowany
        if(null !== $this->session->is_logged_in){
            
            // Załaduj odpowiednie helpery
            $this->load->helper(array('form', 'url'));
        
            // Konfiguruj opcje uploadu
            $config['upload_path'] = './uploads/'.$this->session->username;
            $config['allowed_types'] = 'pdf';
            $config['max_size']    = 0;
            $config['file_name'] = time().".pdf";
            $this->load->library('upload', $config);
            
            //Konfiguruj opcje validacji
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','Tytuł','trim|required');
            $this->form_validation->set_rules('description','Opis','trim|required');
            
            // Jeśli walidacja się nie powiodła lub nie została zainicjowana
            if ($this->form_validation->run() == FALSE){
                
                // Ładuj model odpowiedzialny za projekty
                $this->load->model("projects");
                
                // Stwórz zmienną z nazwami kategorii
                $data = $this->projects->get_categories();
                
                // Załaduj templata z danymi o kategoriach
                $this->load->view('header');
				$this->load->view('menu');
                $this->load->view('new_project',$data);
                $this->load->view('footer'); 
		    }
            // Jeśli walidacja się powiaodła
            else{
                
                // Przygotuj info o uploadowanym scenariuszu
                $upload_data = $this->upload->data(); 
                $file_name = $upload_data['file_name'];
                
            // przygotuj dane projektu do wprowadzenia do bazy danych
            $project_form_data = array(
                'title' => htmlspecialchars($this->input->post('title')), // Tytuł
                'description' => htmlspecialchars($this->input->post('description')), // Opis
                'creator' => $this->session->username, // Nazwa twórcy projektu
                'creation_time' => time(), // Czas stworzenia projektu podany w UNIX
                'category' => $this->input->post('category'), // Kategoria
                'scenario_dir' => $file_name // Ścieżka dostępu  scenariusza
            );
            
            // Załaduj model odpowiedzialny za projekty
            $this->load->model('projects');
            // Jeśli udało się wprowadzić dane do bazy danych i zuploadować scenariusz
            if($this->projects->insert_project($project_form_data) and $this->upload->do_upload("scenario")){
                //Przenieś do powiadomienia o sukcesie
                redirect('nowy_projekt');
            }
            // Jeśli nie udało się wprowadzić danych do bazy danych
            else{
				
				// Stwórz zmienną z nazwami kategorii
                $data = $this->projects->get_categories();
				
                // Wyświetl problem i wyświetl formulaż nowego projektu
                echo "Problemy z bazą danych lub podany plik nie jest PDFem, prosimy o zgłoszenie się do Administratora lub wgranie PDFu";
                $this->load->view('header');
                $this->load->view('new_project',$data);
                $this->load->view('footer'); 
            }
        }
        }
        // Jeśli użytkownik nie jest zzalogowany
        else{
                redirect('/login'); // Odeślij go do formulaża logowania
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
}
?>