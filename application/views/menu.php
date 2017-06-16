<?php
	echo form_open('zalogowany/wyloguj');
	echo form_submit('wyloguj','Wyloguj');
?>
    
<a href="<?php echo base_url()."zalogowany/nowy_projekt" ?>">Stwórz nowy projekt</a><br/><br/>
<a href="<?php echo base_url()."projekty" ?>">Wszystkie projekty</a><br/>

<br/>
Twoje dane

<?php
	$id_us = $this->session->user_id;
$query = $this->db->query("SELECT first_name,last_name,username,email FROM users WHERE id_user LIKE '$id_us'");
	foreach ($query->result() as $row)
	{
		$row->first_name;
		$row->last_name;
		$row->username;
		$row->email;
	}
?>

<br/>
<br/><?php echo 'Imię: '.$row->first_name; ?>
<br/><?php echo 'Nazwisko: '.$row->last_name; ?>
<br/><?php echo 'Nazwa Użytkownika: '.$row->username; ?>
<br/><?php echo 'E-Mail: '.$row->email; ?>
<br/><br/>zmień adres e-mail
<br/><br/>Zmień hasło
<br/><br/>aktualne hasło
<br/>nowe hasło
<br/>powtórz nowe hasło