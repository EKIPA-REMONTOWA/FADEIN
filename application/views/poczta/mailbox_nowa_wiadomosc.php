				<div class="col-lg-10">
					<?php
						echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
						if(isset($msg)){echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';}
					?>
					<h1>Nowa wiadomość</h1>
					<?php
						echo form_open('poczta/wyslij_wiadomosc');
						echo form_input('message_to', set_value('message_to',''), 'placeholder="Adresat"');
					?>
					<br>
					<br>
					<?php
						echo form_input('message_title', set_value('message_title',''), 'placeholder="Tytuł"');
					?>
					<br>
					<br>
					<?php
						echo form_textarea('message_data', set_value('message_data',''), 'placeholder="Treść"');
					?>
					<br>
					<br>
					<?php
						echo form_submit('wyslij_wiadomosc', set_value('','Wyślij'));
						
						echo form_close();
					?>
					
				</div>
