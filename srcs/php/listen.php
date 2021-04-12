<?php

spl_autoload_register();

use Observer\Publisher;
use Observer\Listener;

$listener1 = new Listener(array('hockey', 'football'));
             
Publisher::getInstance()->listen();
