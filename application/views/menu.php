<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url()?>">
					<img alt="FADEIN:" src="#">
				</a>
			</div>		
		</div>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url()."projekty/nowy_projekt" ?>">Stwórz nowy projekt</a></li>
				<li><a href="<?php echo base_url()."projekty" ?>">Wszystkie projekty</a></li>
				<!------- SZUKAJKA ------------------->
				<li>
				<div class="btn-toolbar row-center ">
<?php
	$kat_szukania = array('Nazwa użytkownika','Profesja','Imię','Nazwisko');
	$dropdown_bootstrap_class = array('class' => 'form-control', 'id' => 'sel1');
	echo form_open('zalogowany/result');
?>
						<div class="btn-group">				
							<button type="button" class="btn btn-default active" onClick="Set_search_status(1)" id="search_1" title="Szukanie użytkowników"><span class="glyphicon glyphicon-user"></span></button>
							<button type="button" class="btn btn-default" onClick="Set_search_status(2)" id="search_2" title="Szukanie projektów"><span class="glyphicon glyphicon-facetime-video"></span></button>
						</div>
						<div class="input-group">
							<input type="text" class="form-control" name="argument_szukania">
						</div>
						<div class="input-group">
							<?php echo form_dropdown('kategoria_szukania', $kat_szukania, '', $dropdown_bootstrap_class);?>						
						</div>
						<div class="btn-group">
							<button type="submit" name="Szukaj" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
						</div>
						<input type="hidden" name="zmiennaSzukania" id="zSzukania" value="0">
<?php
	echo form_close();
?>
					</div>
				</li>
				<!------- SZUKAJKA end---------------->
				<li>

					<a href="<?php echo base_url()?>zalogowany/poczta" style="padding: 10px;">
						<span style="font-size:1.6em; margin-top: 2px;" class="glyphicon glyphicon-envelope"></span>
        			</a>
				</li>
				<li>
					<a href="<?php echo base_url()?>zalogowany/panel/<?php echo $this->session->user_id; ?>" title="Twój profil"><b><?php echo $this->session->username;?></b></a>
				</li>
				<li>
<?php
	echo form_open('zalogowany/wyloguj');	
?>
					<button type="sumbit" class="btn btn-danger navbar-btn">Wyloguj</button>
<?php
	echo form_close();
?>
				</li>
			</ul>
		
	</div>
</nav>