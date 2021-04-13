<?php

class Message
{
    public $channel;
	public $msg;

	public function __construct($channel, $msg)
    {
        $this->channel = $channel;
		$this->msg = $msg;
    }
}
