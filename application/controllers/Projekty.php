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
                	$this->load->view('header');
					$this->load->view('menu');
                    $this->load->view('all_projects', $data);
					$this->load->view('footer');
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
				force_download("./uploads/".$this->session->user_id."/".$scenario_name,NULL);
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
					$this->load->view('header');
					$this->load->view('menu');
                    $this->load->view('separate_project', $data);
					$this->load->view('footer');
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
		function nowy_projekt(){  
        
        // Jeśli użytkownik jest zalogowany
        if(null !== $this->session->is_logged_in){
            
            // Załaduj odpowiednie helpery
            $this->load->helper(array('form', 'url'));
        
            // Konfiguruj opcje uploadu
            $config['upload_path'] = './uploads/'.$this->session->user_id;
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = time().".pdf";
			$this->load->library('upload');
			$this->upload->initialize($config);
            
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
				echo $this->upload->display_errors();
				// Stwórz zmienną z nazwami kategorii
                $data = $this->projects->get_categories();
				
                // Wyświetl problem i wyświetl formulaż nowego projektu
				echo $config['upload_path']."<br/>";
				print_r($_FILES)."<br/>";
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
        
    }

?>