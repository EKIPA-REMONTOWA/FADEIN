<div id="register_form">
	<h1>Utwórz nowe konto</h1>
		<?php
		echo form_open('login/create_member');
		echo form_input('first_name', set_value('first_name',''), 'placeholder="Imię"');
		echo form_input('last_name', set_value('last_name',''), 'placeholder="Nazwisko"');
		echo form_input('email', set_value('email',''), 'placeholder="E-mail"');
		echo form_input('username', set_value('username',''), 'placeholder="Nazwa użytkownika"');
		echo form_password('password', '', 'placeholder="Hasło" class="password"');
		echo form_password('password_confirm', '', 'placeholder="Powtórz hasło" class="password"');
		echo form_submit('submit', 'Utwórz konto');
		?>
		<?php echo validation_errors('<p class="error">'); ?>
</div>