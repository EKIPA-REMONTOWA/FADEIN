				<div class="col-lg-10">
					<h1>Nowa wiadomość</h1>
					<?php
						echo form_open('poczta/wyslij_wiadomosc');
						echo form_input('message_title', set_value('message_title',''), 'placeholder="Tytuł"');
					?>
					<br>
					<br>
					<?php
						echo form_textarea('message_data');
					?>
					<br>
					<br>
					<?php
						echo form_submit('wyslij_wiadomosc', set_value('','Wyślij'));
						echo form_close();
					?>
					
				</div>
