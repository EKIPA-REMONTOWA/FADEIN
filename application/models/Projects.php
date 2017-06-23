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
	
    /* 
		Usuwa projekt o podanym id
		Oczekuje id projektu jako parametr
		Zwraca TRUE jeśli się udało i FALSE jeśli się nie udało
	*/
	
    public function delete_project($id){
        //przygotuj zapytanie
        $query = 'DELETE FROM projects WHERE id_project ="'."$id".'";';
        $this->db->query($query);
    }
    
	/* 
		Zwraca wszystkie znajdujące się w bazie danych kategorie projektów w formie tablicy
		Oczekuje id projektu jako parametr
	*/
	
    public function get_categories(){
        // Przygotuj zapytanie
            $this->db->select("name_category"); // Wyciągnij nazwy projektów
            $this->db->from("categories"); // Z tabeli 'categories' 
            // Wykonaj zapytanie
            $query = $this->db->get();
            $result = $query->result_array();
            // Przygotuj uproszczoną tablice z nazwami kategorii
            $categories = array();
            // Włóż do zmiennej odpowiednie kategorie wyciągnięte z bazy danych
            for($i=0; $i<count($result); $i++){
               $categories[$result[$i]["name_category"]] = $result[$i]["name_category"];
            }
            return $categories;
    }
	
	/* 
		Zwraca stringa z nazwą pliku scenariusza przypisanego do danego projektu
		Oczekuje stringa z id projektu
	*/
	
	public function get_scenario_dir($id){
		
		// przygotuj zapytanie
		$this->db->select("scenario_dir"); // Wyciągnij nazwe pliku
		$this->db->from("projects"); // z tabeli "projects"
		$this->db->where("id_project", $id); // gdzie id projektu jest równe podanemu id
		// Wykonaj zapytanie
		$query = $this->db->get();
		$result = $query->result();
		// Zwróć nazwe pliku ze scenariuszem
		return $result[0]->scenario_dir;
	}
	
	/*
		Funkcja zmienia informacje o danym projekcie w bazie danych
		Oczekuje tablicy z indeksami odpowiadającymi kolumnom w tabeli 'projects'
		w których znajdją się dane do zmiany
		W przypadku powodzenia operacji zwraca TRUE a w przypadku porażki zawraca FALSE
	*/
	function update_project($data){
		// W rekordzie o padoanym id
		$this->db->where('id_project',$data["id_project"]);
		// Podmień podane dane, jeśli się powiodło
		if($this->db->update('projects',$data)){
			return TRUE;
		}
		// jeśli się nie powiodło
		else{
			return FALSE;
		}
		
	}
	
}
?>