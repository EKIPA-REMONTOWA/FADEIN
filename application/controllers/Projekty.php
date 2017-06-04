<?php 

    class Projekty extends CI_Controller{
        
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
        
    }

?>