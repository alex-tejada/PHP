<?php

//Reduce errors
error_reporting(0);

//Create a UDP socket
if(!($sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";

// Bind the source address
if( !socket_bind($sock, "127.0.0.1" , 9999) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Could not bind socket : [$errorcode] $errormsg \n");
}

echo "Socket bind OK \n";

//Do some communication, this loop can handle multiple clients
while(1)
{
    echo "Waiting for data ... \n";

    //Receive some data
    $r = socket_recvfrom($sock, $buf, 2048, 0, $remote_ip, $remote_port);
    //echo "$remote_ip : $remote_port -- " . $buf;
     echo $buf;
    //Send back the data to the client
    socket_sendto($sock, $buf . $buf ,2048 , 0 , $remote_ip , $remote_port);
}

socket_close($sock);
