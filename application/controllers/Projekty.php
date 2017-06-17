<?php 

    class Projekty extends CI_Controller{
		
        function __construct(){
			parent::__construct();
			if(NULL == $this->session->is_logged_in){
				redirect('/login');
			}
		}
		
        // Wyświetla wszystkie projekty
        function index($id_projektu = ""){
            
            // Jeśli użytkownik jest zalogowany
            if(NULL !== $this->session->is_logged_in){
                
                // jeśli nie podano żadnego id_projektu do wyświetlenia
                    // Załaduj model odpowiedzialny za projekty
                    $this->load->model('projects');
                    // Przypisz dane wszystkich projektów do zmiennej która zostanie wysłana do widoku
                    $data = $this->projects->get_projects_by_id();
                    // Załaduj widok z danymi
                
                    $this->load->view('all_projects', $data);
            }
            // Jeśli użytkownik nie jest zalogowany
            else{
                redirect('/login');
            }
        }
        // Wyświetla pojedyńczy projekt
        function id_projektu($id_projektu = NULL ){
			
			// Jeśli użytkownik chce ściągnąć scenariusz
			if( NULL !== $this->input->post("get_scenario")){
				// Załaduj biblioteki odpowiedzialne za ściąganie i za projekty
				$this->load->helper('download');
				$this->load->model('projects');
				// Zapisz nazwe ściąganego pliku w zmiennej
				$scenario_name = $this->projects->get_scenario_dir($id_projektu);
				// Wyślij do użytkownika
				force_download("./uploads/".$this->session->username."/".$scenario_name,NULL);
			}
			
            // jeśli nie podano id projektu do wyświetlenia
            if($id_projektu == NULL ){
                redirect('projekty');
            }
            // Jeśli podano jakiś parametr
            else{
                
                // załaduj model odpowiedzialny za projekty
                $this->load->model('projects');
                
                // zapisz parametr w zmiennej
                $param = $this->uri->segment(3);
                
                // jeśli podany parametr ma swój odpowiednik w id projektów
                if($this->projects->is_project_exist($param)){
                    // Przypisz dane projektu o podanym id do zmiennej która zostanie wysłana do widoku
                    $data = $this->projects->get_projects_by_id("$param");
                    // Załaduj widok z danymi
                    $this->load->view('separate_project', $data);
                }
                else{
                    echo 'Podany projekt nie istnieje!<br/><a href="/projekty">powrót</a>';
                }
            }
        }
        
        function usun_projekt(){
            // jeśli użytkownik jst zalogowany
            if(NULL !== $this->session->is_logged_in){
                // jeśli użytkownik klikną w "Usuń projekt"
                if($this->input->post("delate_project")){
                    // załaduj model odpawiadający za projekty
                    $this->load->model('projects');
                    // jeśli udało się usunąć rekord z bazy
                    if(!$this->projects->delete_project($this->input->post("id_project"))){
                        // przekieruj do wszystkich projektów
                        redirect('projekty');
                    }
                    // jeśli nie udało się usunąć rekordu z bazy
                    else{
                        echo 'coś poszło nie tak! skontaktuj się z administratorem</br><a href="projekty">Powrót</a>';
                    }
                        
                }
                // jeśli znalazł się tu przypadkowo
                else{
                    echo 'coś poszło nie tak! skontaktuj się z administratorem</br><a href="projekty">Powrót</a>';
                }
            }
            // Jeśli użytkownik nie jest zalogowany
            else{
                redirect('/login');
            }
			
        }
		
		function edytuj_projekt(){
			// Jeśli użytkownik wysłał dane do zmiany
			if(NULL !== $this->input->post("edit_project_submit")){
				// załaduj model odpowiedzialny za projekty
				$this->load->model("projects");
				// przygotuj dane 
				$data = array(
					'id_project' => $this->input->post("id_project"), // Id
					'title' => htmlspecialchars($this->input->post('title')), // Tytuł
					'description' => htmlspecialchars($this->input->post('description')) // Opis
				);
				// Updatuj dane projektu
				$this->projects->update_project($data);
				// Przenieś na strone projektu
				redirect("/projekty/id_projektu/".$data['id_project']);
				
			}
			// Jeśli użytkownik nie przesłał daanych do zmiany ale zadeklarował taką chęć
			elseif(NULL !== $this->input->post("id_project")){
				// załaduj model odpowiedzialny za projekty
				$this->load->model("projects");
				// Przygotuj dane projektu do wyświetlenia
				$id = $this->input->post("id_project");
				$info = $this->projects->get_projects_by_id($id);
				// Wyświetl formulaż zmiany danych projektu
				$this->load->view("edit_project", $info);
			}
			// Jeśli znalazł się tu przypadkowo
			else{
				// przenieś do panelu projektów
				redirect("/projekty");
			}
		}
        
    }

?>