<?php

namespace Observer;

require (__DIR__.'/config.php');

use SplObserver;
use SplSubject;

class ChatClient implements SplObserver
{
    private $channels = array();
    private static $redis;

    static function initRedis()
    {
        if (empty(self::$redis))
            self::$redis = new \Redis();
    }

    public function listen($channels)
    {
        $this->channels = $channels;
    }

    public function update(SplSubject $subject)
    {
        self::initRedis();
        self::$redis->pconnect(REDIS_HOST, REDIS_PORT);
        self::$redis->subscribe($this->channels, function ($redis, $chan, $msg) {
            print "$msg \n";
        });
    }
}
