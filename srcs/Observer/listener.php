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
            $redis->pconnect(REDIS_HOST, REDIS_PORT);
            $redis->subscribe($this->channels, function ($redis, $chan, $msg) {
                print $msg;
            });
        }
    }
}
