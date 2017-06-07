<a href="<?php echo base_url()."/projekty"?>">Powrót</a><br/><br/><br/>
<?php 

    for($i=0; $i<count($this->_ci_cached_vars); $i++){
        
        echo "<b>Tytuł: </b>".$this->_ci_cached_vars["$i"]->title."<br/>";
        echo "<b>Kategoria: </b>".$this->_ci_cached_vars["$i"]->category."<br/>";
        echo "<b>Opis: </b>".$this->_ci_cached_vars["$i"]->description."<br/>";
        echo "<b>Twórca projektu: </b>".$this->_ci_cached_vars["$i"]->creator."<br/>";
        
        echo "<b>Data otwarcia projektu: </b>".date("d/m/Y",$this->_ci_cached_vars["$i"]->creation_time)."<br/>";
        // Jeśli użytkownik jest twórcą projektu wyświetl przycisk usuwania projektu
        if($this->session->username == $this->_ci_cached_vars["$i"]->creator){
            echo '<a  href="'.$this->_ci_cached_vars["$i"]->scenario_dir.'" download="'.$this->_ci_cached_vars["$i"]->title.'_scenariusz">Scenariusz<a/><br/>'."</br>";
            $hidden = array('id_project' => $this->_ci_cached_vars["$i"]->id_project);
            echo form_open(base_url()."projekty/usun_projekt","",$hidden);
            echo form_submit('delate_project', 'Usuń projekt')."</br>";
        }
    }

?>
