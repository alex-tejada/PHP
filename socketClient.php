<?php
$server_ip   = '192.168.2.202';
$server_port = 9999;
$beat_period = 100;
$message  = "message";
echo "Sending heartbeat to IP ".$server_ip." port ".$server_port;

if ($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP))
{
  while (1)
  {
    socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);
    sleep($beat_period);
  }
}
else {
  echo "can't create socketn" ;
}
