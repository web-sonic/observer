<?php

require_once __DIR__ . '/Observer/ChatServer.php';
require_once __DIR__ . '/Observer/ChatClient.php';

$chatServer = new ChatServer();

$client2 = new ChatClient();

$client2->listen(['SYSTEM', 'USER', 'MODERATOR']);
$chatServer->registerListener($client2);
$chatServer->notify();

