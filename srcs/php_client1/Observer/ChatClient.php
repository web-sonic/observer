<?php

require_once __DIR__ . '/config.php';

class ChatClient
{
    private $channels = array();
    private static $redis;

    static function initRedis()
    {
        if (empty(self::$redis))
		self::$redis = new Redis();
    }

    public function listen($channels)
    {
        $this->channels = $channels;
    }

    public function update()
    {
        self::initRedis();
        self::$redis->pconnect(REDIS_HOST, REDIS_PORT);
        self::$redis->subscribe($this->channels, function ($redis, $chan, $msg) {
            switch($chan) {
                case 'USER':
                    print "USER: $msg \n";
                    break;
                case 'MODERATOR':
                    print "MODERATOR: $msg \n";
                    break;
                case 'SYSTEM':
                    print "SYSTEM: $msg \n";
                    break;
                default:
                    break;
            }
        });
    }
}
