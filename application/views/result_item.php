<?php
	foreach ($wynik as $value) {
		echo 'Nick: '.$value['username']."<br>";
		echo 'Imię: '.$value['first_name']."<br>";
		echo 'Nazwisko: '.$value['last_name']."<br>";
		echo 'Profesja: '.$value['profesja1'].", ".$value['profesja2'].", ".$value['profesja3']."<br>";
		echo '-------------------------------------------------------------<br>';
	}
?>