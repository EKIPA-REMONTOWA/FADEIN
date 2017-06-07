<?php
echo form_open_multipart('upload/do_upload');
echo form_input(array('type' => 'file','name' => 'userfile'));
echo form_submit('submit','upload');
echo form_close();
?>
- See more at: https://arjunphp.com/uploading-pdf-files-codeigniter/#sthash.Mn13wVdC.dpuf