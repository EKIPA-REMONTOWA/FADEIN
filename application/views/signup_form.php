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
			$profData = array('placeholder' => 'Dodaj profesję', 'id' => 'profInput');
		?>
		<div id="profHolder">
		<?php
			echo form_input('professions', set_value('',''), $profData);
			$addProfData = array('onClick' => 'dodajProf(this)');
			echo form_button('add_prof','Dodaj', $addProfData);
		?>
		<div id="profHints"></div>
		</div>
		<?php
			echo form_submit('submit', 'Utwórz konto');
			echo validation_errors('<p class="error">');
			$hidden = array('type' => 'hidden', 'name' => 'prof1', 'id' => 'prof1');
			echo form_input($hidden);
			$hidden2 = array('type' => 'hidden', 'name' => 'prof2', 'id' => 'prof2');
			echo form_input($hidden2);
			$hidden3 = array('type' => 'hidden', 'name' => 'prof3', 'id' => 'prof3');
			echo form_input($hidden3);
		?>
</div>