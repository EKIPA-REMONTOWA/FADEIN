<h1>Edytuj projekt</h1>
<?php echo validation_errors(); ?>
   <?php
		$hidden = array('id_project' => $this->_ci_cached_vars["0"]->id_project);
		echo form_open(base_url()."projekty/edytuj_projekt","",$hidden);
		echo form_input('title', set_value('title',$this->_ci_cached_vars["0"]->title), 'placeholder="Tytuł"');
        echo "<br/>";
		echo form_textarea('description', set_value('description',$this->_ci_cached_vars["0"]->description), 'placeholder="Opis"');
        echo "<br/>";
		echo form_submit('edit_project_submit', 'Zmień projekt');
?>

        <a href="<?php echo base_url()?>">Wróć do panelu głównego</a>