<?php
$message = new Redis();
$message->connect('172.20.255.210');
//$message->set('message',$_GET['message']);
$tab = $message->lrange('message', '0' , '-1');
//print_r($tab);
 foreach ($tab as $key => $value) {
   echo $value . $key;
   echo "<br/>";
}
 