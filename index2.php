<?php
$client = new Redis();
$client->connect('172.20.255.210');
$client->set('test','Comment allez-vous ?');
// echo $client->get('test');
$client->incr('visites');
// echo $client->get('visites');
echo "Existence d'une clé : " . $client->exists('visites2');
echo "<br/>";
echo "Type d'une clé : " . $client->type('visites');
echo "<br/>";
echo "Type String : " . Redis::REDIS_STRING;
echo "<br/>";
echo "Type Hash : " . Redis::REDIS_HASH;
echo "<br/>";
echo "Ma clé est-elle un String ? : ";
echo(($client->type('visites') == Redis::REDIS_STRING) ? "Oui" : "not a Strring");
echo "<br/>";
$client->set('hi','Bonjour');
echo "TTL de hi : " . $client->ttl('hi');
echo "<br/>";
$client->expire('hi',30);
echo "TTL de hi : " . $client->ttl('hi');
echo "<br/>";

// echo $client->keys('*');
// print_r($client->keys('*'));
var_dump($client->keys('*'));

// $client->select(2);
// var_dump($client->keys('*'));

$client->rpush('liste', 'a1');
$client->rpush('liste', 'a2');
$client->rpush('liste', 'a3');
$client->rpush('liste', 'a4');
echo "<br/>";

echo "LLEN liste : " . $client->llen('liste');

