<?php

$chatServer = new ChatServer();
// every 1 second -> SYSTEM, USER, MODERATOR - random

$client1  = new ChatClient(); // SYSTEM, USER, MODERATOR
$client2 = new ChatClient(); // USER, MODERATOR

$client1->listen(['SYSTEM', 'USER']);
$chatServer->registerListener($client1);

$event = new MessageEvent('SYSTEM', 'the text');
$chatServer->generateEvent($event);

// клиент сразу же выводит сообщение

// ???

// 0. Observer, без redis +

// 1. сделать в 1 скрипте, сгенерировать 3 сообщения
// php myscript.php

// 2. разделить на процессы. server.php client1.php client2.php

// 3. add web interface

// 4. docker
