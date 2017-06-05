<h1>Stwórz nowy projekt</h1>
<?php echo validation_errors(); ?>
   <?php
		echo form_open(base_url()."zalogowany/nowy_projekt");
		echo form_input('title', set_value('title',''), 'placeholder="Tytuł"');
        echo "<br/>";
		echo form_textarea('description', set_value('description',''), 'placeholder="Opis"');
        echo "<br/>";
        echo form_dropdown("category",$this->_ci_cached_vars);
    ?>
        <?php echo form_submit('new_project_submit', 'Utwórz projekt');?>

        <a href="<?php echo base_url()?>">Wróć do panelu głównego</a>
