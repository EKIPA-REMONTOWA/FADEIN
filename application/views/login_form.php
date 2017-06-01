<div id="login_form">
	<?php if (isset($account_created)) { ?>
		<h3><?php echo $account_created; ?></h3>
	<?php } else { ?>
		<h1>Zaloguj się.</h1>
	<?php } ?>
	
	<?php 
		echo form_open('login/validate_credentials');
 		echo form_input('username', '', 'placeholder="login"');
 		echo form_password('password', '', 'placeholder="hasło" class="password"');
		echo form_submit('submit', 'Login');
		echo anchor('login/signup', 'Utwórz konto');
		echo form_close();
	?>
</div>