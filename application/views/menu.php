<?php
	echo form_open('zalogowany/wyloguj');
	echo form_submit('wyloguj','Wyloguj');
?>
<br>
<a href="<?php echo base_url()."zalogowany/nowy_projekt" ?>">Stwórz nowy projekt</a><br/>
<a href="<?php echo base_url()."projekty" ?>">Wszystkie projekty</a><br/>