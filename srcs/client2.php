<?php

spl_autoload_register(function ($name) {
    $name = str_replace('\\', '/', $name);
    require_once (__DIR__ . "/$name.php");
});

use Observer\ChatClient;
use Observer\ChatServer;

$chatServer = new ChatServer();

$client2 = new ChatClient();

$client2->listen(['SYSTEM', 'USER', 'MODERATOR']);
$chatServer->attach($client2);
$chatServer->notify();
