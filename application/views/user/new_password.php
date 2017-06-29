<h1>Edytuj Hasło</h1>
<?php if(isset($error)){echo $error;} ?>
<?php 

	echo form_open(base_url()."zalogowany/zmien_haslo");
	echo form_password('new_password1', '', 'placeholder="Nowe hasło" class="password"');
	echo form_password('new_password2', '', 'placeholder="Powtórz hasło" class="password"');
	echo form_submit('change_password', 'Zmień hasło');

?>
<a href="panel/<?php echo $this->session->user_id ?>">Powrót</a>