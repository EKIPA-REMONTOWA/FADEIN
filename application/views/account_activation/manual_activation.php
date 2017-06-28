<?php if (isset($mesg)){echo $mesg."<br/>";} ; ?>
<?php if (!isset($mesg)){echo"<h1>Nie udało się aktywować konta!</h1>"."Podaj adres e-mail który posłużył do tworzenia konta aby wysłać link aktywacyjny ponownie<br/><br/>";} ?>
<?php 
	echo form_open(base_url()."zalogowany/aktywuj_konto");
	echo form_input('email', set_value('email',''), 'placeholder="E-mail"');
	echo form_input('username', set_value('username',''), 'placeholder="Login"');
	echo form_submit('activate_account', 'Wyślij');
	echo form_close();
?>


