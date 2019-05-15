<?php
$score = new Redis();
$score->connect('172.20.255.210');
$score->select(8);

echo "<h1>Tableau des scores</h1>";

$score->zadd('jeu',$_GET['score'],$_GET['username']);
//$score->zadd('jeu',$_GET['score']);

//print_r($score->zrange('jeu',0, -1,true));

$tab = $score->zrevrange('jeu',0, -1,true);
if($_GET['token'] == 'JX4YUiMqYCActHuPLYPA'){

   foreach ($tab as $key => $value) {
      echo $key." : ".$value;
      echo '<br>';
   }
   
}



?>





<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Score</title>
</head>
<body>
   
</body>
</html>