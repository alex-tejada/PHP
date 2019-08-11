<?php

while (1){
  $fp = fsockopen("192.168.3.94", 80, $errno, $errstr, 30);
  if (!$fp)
  {
      echo "$errstr ($errno)<br />\n";
  }
  else
  {
      //fwrite($fp, "Your message");
      while (!feof($fp))
      {
          echo fgets($fp, 128);
      }
      //fclose($fp);
  }
}
?>
