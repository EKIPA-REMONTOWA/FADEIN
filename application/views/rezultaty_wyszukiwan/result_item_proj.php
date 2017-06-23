<?php
	foreach ($wynik as $value) {
		echo '<b>Tytuł filmu</b>: '.$value['title']."<br>";
		echo '<b>Twórca projektu</b>: '.$value['creator']."<br>";
		echo '<b>Gatunek</b>: '.$value['category']."<br>";
		echo '<b>Opis</b>: '.$value['description']."<br>";
		echo "<b>Data utworzenia projektu: </b>".date("d/m/Y",$value['creation_time'])."<br/>";
		echo '-------------------------------------------------------------<br>';
	}
?>