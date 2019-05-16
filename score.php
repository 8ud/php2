<?php
$score = new Redis();
$score->connect('172.20.255.210'); // connexion a redis
$score->select(8);

echo "<h1>Tableau des scores</h1>";

if(isset($_GET['score']) && isset($_GET['username'])){
if($_POST['token'] == 'JX4YUiMqYCActHuPLYPA'){ // verification du token

   $score->zadd('jeu',$_GET['score'],$_GET['username']); // ajoute les elements GET dans la liste jeu
}
}

//$score->zadd('jeu',$_GET['score']);

//print_r($score->zrange('jeu',0, -1,true));

echo "vous avez demandez la page : ". $_GET['page'] . "<br/>"; // pagination

$debut= $_GET['page'] . "0";
$fin=$_GET['page'] ."9";

// connexion a la base de donnee

$m= new PDO('mysql:host=172.20.255.34;dbname=score', 'score', 'score');
$tableau= $m->query('SELECT * from score  order by  score desc limit '.$debut.', 10'); //requete mysql


echo "<br/>Une requete SQL est faite <br/><br/>";


foreach ($tableau as $ligne)
{
   echo $ligne['login'] . " : " . $ligne['score'] . "<br/>";
}


echo '<hr>';

$tab = $score->zrevrange('jeu',$debut, $fin,true);  // tri inversé de la liste


   foreach ($tab as $key => $value) {  // affichage de la liste sous forme de tableau
      echo $key." : ".$value;
      echo '<br>';
   }
   
   var_dump($_POST);

   if($_GET['page'] == 0){

      $precedente = 0;
   }
   else{
     $precedente =  $_GET['page'] -1;

   }

   $suivante = ($_GET['page'] +1);

   echo '<a href="?page=' . $precedente .'">Precedent</a>';
   echo "-";
   echo '<a href="?page=' . $suivante .'">Suivant</a>';
   // echo '<a href="?page=' . ($_GET['page'] +1) .'">Suivant</a>';
   



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