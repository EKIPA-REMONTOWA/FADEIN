<?php
	foreach ($wynik as $value) {
		echo 'Nick: '.$value['username']."<br>";
		echo 'Imię: '.$value['first_name']."<br>";
		echo 'Nazwisko: '.$value['last_name']."<br>";
		echo 'Profesja: '.$value['profesja1'].", ".$value['profesja2'].", ".$value['profesja3']."<br>";
?>
		<button class="btn-primary" onClick="dodajZnajomego(<?php echo $value['id_user'];?>)"><span class="glyphicon glyphicon-user"></span> Dodaj znajomego</button><br>
<?php
		echo '-------------------------------------------------------------<br>';
	}
?>