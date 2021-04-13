<?php

require_once __DIR__ . '/Observer/ChatServer.php';
require_once __DIR__ . '/Observer/ChatClient.php';

$chatServer = new ChatServer();

$client1 = new ChatClient();

$client1->listen(['SYSTEM', 'USER']);
$chatServer->registerListener($client1);
$chatServer->notify();
