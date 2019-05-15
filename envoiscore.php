<?php

$score = new Redis();
$score->connect('172.20.255.210');
$score->select(8); ?>








<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Envoi score</title>
</head>
<body>
   
<form action="score.php" method="get">
Username<input  class="form-control col-4 offset-4" type="text" name="username">
Score<input  class="form-control col-4 offset-4" type="text" name="score">
<input type="text" name="token" value="JX4YUiMqYCActHuPLYPA" hidden>
<button class="btn btn-success" type="submit">Envoyer</button>

</form>



</body>
</html>