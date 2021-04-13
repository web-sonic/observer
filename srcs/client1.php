<?php

spl_autoload_register(function($name) {
    $name = str_replace('\\', '/', $name);
    require_once( __DIR__ . "/$name.php"); 
});

use Observer\ChatServer;
use Observer\ChatClient;

$chatServer = new ChatServer();

$client1 = new ChatClient();

$client1->listen(['SYSTEM', 'USER']);
$chatServer->attach($client1);
$chatServer->notify();
