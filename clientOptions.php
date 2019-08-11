<?php

function decodeJsonString($json)
{
  try
  {
    $obj = json_decode($json);
    return $obj;
  }
  catch (Exception $e)
  {
    echo 'EXCEPTION: ',  $e->getMessage(), "\n";
  }
}
function mediaOptionsManager($messageid,$json)
{
  if ($messageid === "M1A")
  {
    return $messageid;
  }
  else if ($messageid === "M1U")
  {
    echo "Unit ID: ".$json -> {'unitid'}."/n Upload result: ".$json -> {'uploadResult'};
    return "M5".$json -> {'uploadResult'};
  }
}

function infoOptionsManager($messageid,$json)
{
  if ($messageid === "I1U")
  {
    return $messageid;
  }
}
function manageClientMessage($messageid, $json)
{
  $actionForServer = "";
  if(strpos($messageid, 'M')!==false)
  {
    $actionForServer = mediaOptionsManager($messageid,$json);
  }
  else if (strpos($messageid, 'C')!==false)
  {

  }
  else if (strpos($messageid, 'I')!==false)
  {
      $actionForServer = infoOptionsManager($messageid,$json);
  }
  return $actionForServer;
}
