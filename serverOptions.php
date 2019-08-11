<?php
require "conexion.php";
require "unit.php";

function saveUnitData($id)
{

}
function mediaOptionsResult($actionForServer)
{
  if ($actionForServer === "M1U")
  {
    $jsonFromServer = array(
      'messageid' => ""
    );
    return $jsonFromServer;
  }
  else if($actionForServer === "M5A")
  {
    $ip = '';
    $jsonFromServer = array(
      'messageid' => "M5",
      'ip' => $ip
    );
    return $jsonFromServer;
  }
}
function infoOptionsResult($actionForServer,$json,$ip)
{
  if ($actionForServer === "I1U")
  {
    $id = $json -> {'unitid'};
    $model = $json -> {'model'};
    $firmware = $json -> {'firmware'};
    $conn = connect();
    insertUnit($conn,$id,$model,$firmware,$ip);
    $jsonFromServer = array(
      'messageid' => "null"
    );
    return $jsonFromServer;
  }
  else if($actionForServer === "I1A")
  {
    $jsonFromServer = array(
      'messageid' => "I1U"
    );
    return $jsonFromServer;
  }
  else{
    return null;
  }
}
function manageServerResult($actionForServer,$json,$ip)
{
  $jsonFromServer = null;
  echo "Action: ".$actionForServer;
  if(strpos($actionForServer, 'I')!==false)
  {
    $jsonFromServer = infoOptionsResult($actionForServer,$json,$ip);
  }
  else if (strpos($actionForServer, 'M')!==false)
  {
    $jsonFromServer = mediaOptionsResult($actionForServer,$json);
  }
  else if (strpos($actionForServer, 'C')!==false){

  }
  return $jsonFromServer;
}
