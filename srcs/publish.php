<?php  
$redis = new Redis();    
$redis->pconnect('127.0.0.1',6379);
  $redis->publish('chan-1', 'hello, world!'); // send message to channel 1.
  $redis->publish('chan-2', 'hello, world2!'); // send message to channel 2.
  $redis->publish('test', 'quit'); // send message to channel 2.

  print "\n";
  $redis->close();

  
 