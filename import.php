<?php 
// IMPORT
$score = new Redis();
$score->connect('172.20.255.210'); // connexion a redis
$score->select(8);

$m= new PDO('mysql:host=172.20.255.34;dbname=score', 'score', 'score'); //connexion a la base mysql

// $debut = microtime(TRUE);
$tableau= $m->query('SELECT * from score'); //requete mysql
//  $fin = microtime(TRUE);
//  $temp = $fin - $debut; //calcul du temps
//  echo $temp;



foreach ($tableau as $ligne){

   echo 'Login : '.$ligne['login'];
   echo "<br/>";
   echo 'Score : '.$ligne['score'];
   // var_dump($ligne);
   echo "<br/>";
   $score->zadd('jeu',$ligne['score'],$ligne['login']);
}

echo "nb d'enregistrement : ". $score->zSize('jeu');