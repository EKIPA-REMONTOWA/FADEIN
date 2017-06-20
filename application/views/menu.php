<?php
// Wyświetl dane o użytkowniku
	echo 'nazwa użytkownika=  '.$this->session->username;
	echo '<br>';
	echo 'id zalogowanego użytkownika=  '.$this->session->user_id;
?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url()."zalogowany/nowy_projekt" ?>">Stwórz nowy projekt</a></li>
				<li><a href="<?php echo base_url()."projekty" ?>">Wszystkie projekty</a></li>
				<li><a href="<?php echo base_url()."szukaj" ?>">Szukaj użytkownika</a></li>
				<!------- SZUKAJKA ------------------->
				<li>
<?php
	$kat_szukania = array('Nazwa użytkownika','Profesja','Imię','Nazwisko');
	$dropdown_bootstrap_class = array('class' => 'form-control', 'id' => 'sel1');
	echo form_open('zalogowany/result');
?>
					<div class="input-group">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span></button>
							<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-facetime-video"></span></button>
						</div>
						<input type="text" class="form-control" name="argument_szukania">
						<div class="input-group-btn">
<?php
	echo form_dropdown('kategoria_szukania', $kat_szukania, '', $dropdown_bootstrap_class);
?>
							<button type="submit" name="Szukaj" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
<?php
	echo form_close();
?>
				</li>
				<!------- SZUKAJKA end---------------->
				<li>
				<?php
					echo form_open('zalogowany/wyloguj');	
				?>
					<button type="sumbit" class="btn btn-default navbar-btn">Wyloguj</button>
				<?php
					echo form_close();
				?>
				</li>
				</ul>
		</div>
	</div>
</nav>