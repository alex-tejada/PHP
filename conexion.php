<?php
function connect()
{
$servername = "127.0.0.1";
$username ="root"; //"hivisionled_red";
$password = "";//"GzWb5zkVjV7FD8M38yomSyBS";
$db="cms";//"hivisionled_red";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);
  // Check connection
  if ($conn->connect_error)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

?>
