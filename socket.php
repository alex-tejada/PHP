<?php
  $server_ip = '127.0.0.1';
  $server_port = 43278;
  $beat_period = 5;
  $message = 'PHP Socket Server';

  $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP))

  socket_sendto($socket, $message, strlen($message), 0, $server_ip, $server_port);


?>
