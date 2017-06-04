<?php

class Projects extends CI_Model {
    
    // Dodawanie nowego projektu do bazy 
    // Oczekuje tablicy zawierającej dane o nowym prjekcie z indeksami odpowiadającymi nazwom kolumn w tabeli 'projects'
    
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
    
    /*  
        Funkcja wyświetla wszystkie stworzone projekty lub jeden konkretny w zależności od parametru
        Aby wyświetlić konkretny projekt oczekuje jednego parametru który będzie stringiem z id projektu
        W przypadku kiedy nie podamy parametru wyświetli wszystkie istniejące projekty
    */
    
    public function get_projects_by_id($id_of_project = FALSE){
        
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
        // Jeśli podano zmienną
        else{
            // Przygotuj zapytanie
            $this->db->select("*"); // Wyciągnij wszystko
            $this->db->from("projects"); // Z tabeli 'projects' 
            $this->db->where("id_project", $id_of_project); //Gdzie kolumna id_project jest taka sama jak podany parametr
            // Wykonaj zapytanie
            $query = $this->db->get();
            // Zwróć tablice z wynikiem
            return $query->result();
        }
    }
    
    /* 
        Oczekuje jako parametru stringa z numerem id projektu
        Zwraca True jeśli istnieje w bazie danych taki projekt
        Zwraca False jeśli taki projekt nie istnieje 
    */
    
    public function is_project_exist($id){
        // Przygotuj zapytanie
            $this->db->select("id_project"); // Wyciągnij wszystko
            $this->db->from("projects"); // Z tabeli 'projects' 
            $this->db->where("id_project", $id); //Gdzie kolumna id_project jest taka sama jak podany parametr
            // Wykonaj zapytanie
            $query = $this->db->get();
            // Zwróć tablice z wynikiem
            return $query->result();
    }
    
    public function delete_project($id){
        //przygotuj zapytanie
        $query = 'DELETE FROM projects WHERE id_project ="'."$id".'";';
        $this->db->query($query);
    }
    
    
}
?>