<?php

class Projects extends CI_Model {
    
    // Dodawanie nowego projektu to bazy 
    // Oczekuje tablicy z indeksami odpowiadającymi nazwom kolumn w tabeli 'projects'
    
	public function insert_project($data = FALSE){
        
        // Jeśli powiodło się wstawianie do bazy danych
       if($this->db->insert('projects', $data)){
           return TRUE;
       }
        // Jeśli nie powiodło się wstawianie do bazy danych
        else{
           return FALSE;
       }
        
    }
    
    // Funkcja wyświetla wszystkie stworzone projekty lub jeden konkretny
    // Oczekuje zmiennej zawierająej id danego projektu który jest stringiem lecz nie jest wymagany
    // W przypadku kiedy nie podamy parametru wyświetli wszystkie istniejące projekty
    
    public function display_projects($id_of_project = FALSE){
        // Jeśli nie podano id projektu
        if($id_of_project == FALSE){
            
            // Przygotuj zapytanie
            $this->db->select("*"); // Wyciągnij wszystko
            $this->db->from("projects"); // Z tabeli 'projects'
            // Wykonaj zapytanie
            $query = $this->db->get();
            // Zwróć tablice ze wszystkimi wynikami
            return $query->result();
            
        }
        // Jeśli podano parametr
        else{
            // Przygotuj zapytanie
            $this->db->select("*"); // Wyciągnij wszystko
            $this->db->from("projects"); // Z tabeli 'projects' 
            $this->db->where("id", $id_of_project); //Gdzie kolumna id jest taka sama jak podany parametr
            // Wykonaj zapytanie
            $query = $this->db->get();
            // Zwróć tablice ze wszystkimi wynikami
            return $query->result();
        }
    }
    
    
    
    
}
?>