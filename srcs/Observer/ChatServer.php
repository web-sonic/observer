<?php

require_once __DIR__ . '/config.php';

class ChatServer
{
    private $observer;
	private static $redis;

    static function initRedis()
    {
        if (empty(self::$redis))
		self::$redis = new Redis();
    }

    public function registerListener($observer)
    {
        $this->observer = $observer;
    }

    public function generateEvent($event)
    {
        self::initRedis();
		self::$redis->pconnect(REDIS_HOST, REDIS_PORT);
		self::$redis->publish($event->channel, $event->msg);
		self::$redis->close();
    }

    public function notify()
    {
        $this->observer->update();
    }
}
