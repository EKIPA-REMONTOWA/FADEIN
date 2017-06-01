<?php
	echo form_open('zalogowany/wyloguj');
	echo form_submit('wyloguj','Wyloguj');
?>
    
<a href="<?php echo base_url()."zalogowany/nowy_projekt" ?>">Stwórz nowy projekt</a><br/>