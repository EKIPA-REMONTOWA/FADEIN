<h1>Nie udało się aktywować konta! Najprawdopodobnij twój link jest nie poprawny</h1>
Podaj adres e-mail ktury posłużył do tworzenia konta aby wysłać go ponownie<br/><br/>
<?php 

	echo form_open(base_url()."zalogowany/aktywuj_konto");
	echo form_input('email', set_value('email',''), 'placeholder="E-mail"');
	<?php echo form_submit('activate_account', 'Utwórz projekt');?>
?>


