<?php

namespace Observer;

require_once (__DIR__.'/config.php');

class Message
{
    private $channel;
	private $msg;
	private static $redis;

	public function __construct($channel, $msg)
    {
        $this->channel = $channel;
		$this->msg = $msg;
    }

	static function initRedis()
    {
        if (empty(self::$redis))
		self::$redis = new \Redis();

    }

	public function publish()
	{
		self::initRedis();
		self::$redis->pconnect(REDIS_HOST, REDIS_PORT);
		self::$redis->publish($this->channel, $this->msg);
		self::$redis->close();
	}
}
