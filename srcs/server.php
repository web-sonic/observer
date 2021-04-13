<?php

spl_autoload_register(function ($name) {
    $name = str_replace('\\', '/', $name);
    require_once (__DIR__ . "/$name.php");
});

use Observer\ChatServer;
use Observer\Message;

$chatServer = new ChatServer();

while (true) {
    $event = new Message('SYSTEM', 'message from SYSTEM');
    $chatServer->generateEvent($event);
    sleep(1);
    $event = new Message('USER', 'message from USER');
    $chatServer->generateEvent($event);
    sleep(1);
    $event = new Message('MODERATOR', 'message from Moderator');
    $chatServer->generateEvent($event);
    sleep(1);
}
