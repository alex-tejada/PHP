<?php

  function insertUnit($conn,$id,$model,$firmware,$ip)
  {
    $sql = "INSERT INTO unidad (idunit,model,firmware,ip) VALUES ('".$id."','".$model."','".$firmware."','".$ip."');";
    if($conn->query($sql)===TRUE){
      echo "Rows Inserted";
    }
    else{
      echo "Error: ".$conn->error;
    }
    $conn->close();
  }
?>
