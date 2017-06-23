<b>Nazwa użytkownika: </b><?php echo $this->_ci_cached_vars[0]->username; ?><br/>
<b>Imie i nazwisko: </b><?php echo $this->_ci_cached_vars[0]->first_name." ".$this->_ci_cached_vars[0]->last_name; ?><br/>
<b>Email: </b><?php echo $this->_ci_cached_vars[0]->email; ?><br/>
<b>Profesje: </b><?php echo $this->_ci_cached_vars[0]->profesja1." ".$this->_ci_cached_vars[0]->profesja2." ".$this->_ci_cached_vars[0]->profesja3;?>
<?php 
	//jeśli użytkownik wszedł na swój profil
	if($this->session->username == $this->_ci_cached_vars[0]->username){ ?>
		<br/><a href= <?php echo base_url()."zalogowany/zmien_haslo"?> >Zmien Hasło</a>
<?php } 
?>
<br/><a href="<?php echo base_url()."zalogowany" ?>" >Powrót</a>
