<?php

class Zalogowany extends CI_Controller {
	
	function panel()
	{
        // Jeśli użytkownik nie jest zalogowany
		if(!isset($this->session->is_logged_in)){
            // przenieś do formulaża logowania
			redirect('/login');
		}
        // Wyświetl dane o użytkowniku
		echo 'nazwa użytkownika=  '.$this->session->username;
		echo '<br>';
		echo 'zmienna stanu zalogowania=  '.$this->session->is_logged_in;
        
        // Załaduj widok z panelem kontrolnym użytkownika
		$this->load->view('menu');
        
	}
	
	function wyloguj()
	{
        // Zniszcz sesję
		$this->session->sess_destroy();
        // Przenieś do fomulaża logowania
		redirect('/login');
	}
	
    function nowy_projekt(){  
        
        // Jeśli użytkownik jest zalogowany
        if(null !== $this->session->is_logged_in){
            
            // Załaduj odpowiednie helpery
            $this->load->helper(array('form', 'url'));
            
            //Załaduj odpowiednie metody
            $this->load->library('form_validation');
                
            // Ustaw wymagania walidacji formularza nowego projektu
            $this->form_validation->set_rules('title','Tytuł','trim|required');
            $this->form_validation->set_rules('description','Opis','trim|required');
            
            // Jeśli walidacja się nie powiodła lub nie została zainicjowana
            if ($this->form_validation->run() == FALSE){
                // Załaduj templata jeszcze raaz z ewentualnymi błędami
                $this->load->view('header');
                $this->load->view('new_project');
                $this->load->view('footer'); 
		    }
            // Jeśli walidacja się powiaodła
            else{
            
            // przygotuj dane do wprowadzenia do bazy danych
            $project_form_data = array(
                'title' => htmlspecialchars($this->input->post('title')), // Tytuł
                'description' => htmlspecialchars($this->input->post('description')), // Opis
                'creator' => $this->session->username, // Nazwa twórcy projektu
                'creation_time' => time() // Czas stworzenia projektu podany w UNIX
            );
            
            // Załaduj model odpowiedzialny za projekty
            $this->load->model('projects');
            // Jeśli udało się wprowadzić dane do bazy danych
            if($this->projects->insert_project($project_form_data)){
                //Przenieś do powiadomienia o sukcesie
                // Stworzyłem nowy kontroler aby po odświerzeniu projekt się nie duplikował
                redirect('nowy_projekt');
            }
            // Jeśli nie udało się wprowadzić danych do bazy danych
            else{
                // Wyświetl problem i wyświetl formulaż nowego projektu
                echo "Problemy z bazą danych, prosimy o zgłoszenie się do Administratora";
                $this->load->view('header');
                $this->load->view('new_project');
                $this->load->view('footer'); 
            }
        }
        }
        // Jeśli użytkownik nie jest zzalogowany
        else{
                redirect('/login'); // Odeślij go do formulaża logowania
        }
    }
}
?>