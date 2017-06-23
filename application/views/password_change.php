<h1>Edytuj Hasło</h1>
<?php echo validation_errors(); ?>
<?php if(isset($error)){echo $error;} ?>
<?php 

	echo form_open(base_url()."zalogowany/zmien_haslo");
	echo form_password('password', '', 'placeholder="Hasło" class="password"');
	echo form_password('password_confirm', '', 'placeholder="Powtórz hasło" class="password"');
	echo form_submit('change_submit', 'Zmień hasło');

?>
<a href="panel/<?php echo $this->session->user_id ?>">Powrót</a>