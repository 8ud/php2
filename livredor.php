<?php
$message = new Redis();
$message->connect('172.20.255.210');
 $message->rpush('livre',$_GET['message']);
 $tab = $message->lrange('message', '0' , '-1');
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>chat</title>
    <meta name="author" content="david">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    * {
       text-align : center;
    }
    #card {
       border: 2px solid black;
       margin : auto;
       margin-bottom : 20px;
       width : 500px;
      }

    </style>
</head>

<body>
<div  id="card"><?php foreach ($tab as $key => $value) {
   echo $value . $key;
   echo "<br/>";
}?></div>
<form  action="" method= "get">
<input  class="form-control col-4 offset-4" type="text" value= "" name="message">
<button class="btn btn-success" type="submit">Envoyer</button>
</form>
<?php echo 'nombre de messages : ' . $message->llen('livre');
 echo "<br/>";
 echo 'nombre de connexions : ' . $message->incr('livre') ?>
</body>
</html>