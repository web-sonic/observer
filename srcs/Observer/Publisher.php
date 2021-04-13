<?php

namespace Observer;

class Publisher
{
    private static $instance = null;
    private $observers = array();

    private function __construct()
    {}

    private function __clone()
    {}

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Publisher();
        }
        return self::$instance;
    }

    public function listen()
    {
        $this->notifyObservers();
    }

    public function registerObserver(Observer $obj)
    {
        $this->observers[] = $obj;
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $obj) {
            $obj->notify($this);
        }
    }
}
