<a href="<?php echo base_url() ?>">Powrót</a><br/><br/><br/>
<?php 

    for($i=0; $i<count($this->_ci_cached_vars); $i++){
        echo "<b>Tytuł:</b> ".$this->_ci_cached_vars["$i"]->title."<br/>";
        echo "<b>Opis </b>".$this->_ci_cached_vars["$i"]->description."<br/>";
        echo "<b>Twórca projektu: </b>".$this->_ci_cached_vars["$i"]->creator."<br/>";
        echo "<b>Data otwarcia projektu: </b>".date("d/m/Y",$this->_ci_cached_vars["$i"]->creation_time)."<br/>";
        echo "<br/>";
    }
        
    
?>