<?php

namespace Observer;

use SplSubject;
use SplObjectStorage;
use SplObserver;
use Observer\Message;

class ChatServer implements SplSubject
{
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function generateEvent($event)
    {
		$event->publish();
    }
	
    public function notify()
    {
        foreach ($this->observers as $observer) {
			$observer->update($this);
        }
    }
}
