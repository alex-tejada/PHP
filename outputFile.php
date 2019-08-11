<?php
  $filename = $_REQUEST['filename'];
  $fileData = file_get_contents($filename);
  echo $fileData;
?>
