<?php

namespace Observer;

use Observer\Publisher;
use Observer\Observer;

class Listener implements Observer
{

    private $channels;

    public function __construct($channels)
    {
        $this->channels = $channels;
        Publisher::getInstance()->registerObserver($this);
    }

    public function notify($obj)
    {
        if ($obj instanceof Observer) {
            $redis = new Redis();
            $redis->pconnect('127.0.0.1', 6379, 0, NULL, 0, 5);
            $redis->subscribe($this->channels, function ($redis, $chan, $msg) {
                print $msg;
            });
        }
    }
}
