<h1>Podaj swoje stare hasło</h1>
<?php 
	if(isset($error)){echo "<div>$error<div>";}
	echo form_open(base_url()."zalogowany/zmien_haslo");
	echo form_password('password1', set_value('password1',''), 'placeholder="hasło"');
	echo form_password('password2', set_value('password2',''), 'placeholder="potwierdzenie hasła"');
	echo form_submit('password_validation', 'Dalej');
	echo form_close();
?>
<a href="panel/<?php echo $this->session->user_id ?>">Powrót</a>