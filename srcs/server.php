<?php

require_once __DIR__ . '/Observer/ChatServer.php';
require_once __DIR__ . '/Observer/Message.php';

$chatServer = new ChatServer();

while (true) {
    $n = rand(0, 2);

    switch($n) {
        case 0:
            $event = new Message('USER', 'new message');
            $chatServer->generateEvent($event);
            break;
        case 1:
            $event = new Message('SYSTEM', 'new message');
            $chatServer->generateEvent($event);
            break;
        case 2:
            $event = new Message('MODERATOR', 'new message');
            $chatServer->generateEvent($event);
            break;
    }
    sleep(1);
}
