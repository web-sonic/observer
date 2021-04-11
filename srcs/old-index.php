<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

interface Observer
{
    function notify($obj);
}

class Championship
{
    static private $instance = NULL;
    private $observers = array();

    private function __construct()
    {}
    
    private function __clone()
    {}

    static public function getInstance()
    {
        if (self::$instance == NULL) {
            self::$instance = new Championship();
        }
        return self::$instance;
    }

    public function publish()
    {
		$redis = new Redis();
		$redis->pconnect('127.0.0.1', 6379);
		$redis->publish('football', 'Bayern won the Bundesliga');
		$redis->publish('hockey', 'Pittsburgh Penguins won the NHL');
		$redis->publish('football', 'MU won the Championship League');
		$redis->close();
		$this->notifyObservers();
    }

    public function registerObserver(Observer $obj)
    {
        $this->observers[] = $obj;
    }

    function notifyObservers()
    {
        foreach ($this->observers as $obj)
            $obj->notify($this);
    }
}

class Viewer implements Observer
{

	private	$channels;
	
    public function __construct($channels)
    {
		$this->channels = $channels;
        Championship::getInstance()->registerObserver($this);
    }

    public function notify($obj)
    {
		function callback($redis, $channels, $msg)
		{
			switch ($channels) {
				case 'football':
					print "get $msg from $channels\n";
					break;
				case 'hockey';
					print "get $msg from $channels\n";
				default:
					break;
			}
		}

        if ($obj instanceof Championship) {
			$redis = new Redis();
			$redis->pconnect('127.0.0.1', 6379);
            $redis->subscribe(['hockey', 'football'], 'callback');
			$redis->close();
        }
    }
}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

$viewer1 = new Viewer(array('hockey'));
$viewer2 = new Viewer(array('football'));
$viewer3 = new Viewer(array('hockey', 'football'));

debug_to_console("Test");

Championship::getInstance()->publish();
