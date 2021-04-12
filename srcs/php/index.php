<?php

$redis = new Redis();    
$redis->pconnect('redis',6379);
  $redis->publish('hockey', 'Pittsburg Penguins won the NHL'); 
  echo "send message in channel hockey<br/>";
  $redis->publish('football', 'MU won the Legue Championship'); 
  echo "send message in channel football<br/>";
  $redis->publish('test', 'quit');
  echo "send message in channel test<br/>";

  $redis->close();

  
 