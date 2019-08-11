<?php
      require "clientOptions.php";
      require "serverOptions.php";
      //  This is the Server Side code to receive UDP packets
      // and listening to port
      // disable script time out
      set_time_limit(0);
      // create a UDP listening socket and bind it to port
      $socket = socket_create(AF_INET, SOCK_DGRAM, 0);
      $localIP = getHostByName(getHostName());
      socket_bind($socket, $localIP, 139);
      // loop receiving UDP messages / and replay confirmation
      for(;;)
      {
        try
        {
          socket_recvfrom($socket, $packet, 2048, 0, $from, $port);
          echo "Packet received: ".$packet." From: ".$from."";
          $json = decodeJsonString($packet);
          $messageid = $json->{'messageid'};
          $actionForServer = manageClientMessage($messageid,$json);
          $jsonFromServer = manageServerResult($actionForServer,$json,$from);
          $messageid = $jsonFromServer->{'messageid'};
          echo $messageid;
          if($messageid !== "null")
          {
            $packet = json_encode($jsonFromServer);
            socket_sendto($socket, $packet, strlen ($packet), 0, $from, $port);
          }
          else if ($messageid === "null")
          {
            echo "No message returned";
          }
        }
        catch (Exception $e)
        {
          echo 'EXCEPTION: ',  $e->getMessage(), "\n";
        }
      }
      // close socket
      socket_close($socket);
?>
