<?php 

    class Projekty extends CI_Controller{
        
        function index(){
            
            // Jeśli użytkownik jest zalogowany
            if(NULL !== $this->session->is_logged_in){
                
                // Załaduj model odpowiedzialny za projekty
                $this->load->model('projects');
                // Przypisz dane do zmiennej która zostanie wysłana do widoku
                
                $data = $this->projects->get_projects_by_id();
                // Załaduj model z danymi
                $this->load->view('all_projects', $data);
                
            }
            // Jeśli użytkownik nie jest zalogowany
            else{
                redirect('/login');
            }
        }
        
    }

?>