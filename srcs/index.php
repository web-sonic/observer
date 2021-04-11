<?php
 
function f($redis, $chan, $msg) {
    switch($chan) {
        case 'chan-1':
            print "get $msg from $chan\n";
            break;
        case 'chan-2':
            print "get $msg FROM $chan\n";
            break;
        case 'chan-3':
            break;
    }
}
 
ini_set('default_socket_timeout', -1);

$redis = new Redis();
$redis->pconnect('127.0.0.1',6379);
$redis->setOption(Redis::OPT_READ_TIMEOUT, -1);

$redis->subscribe(array('chan-1', 'chan-2', 'chan-3'), 'f');
print "\n";
 
?>
