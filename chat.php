<?php
$message = new Redis();
$message->connect('172.20.255.210');
 $message->rpush('message',$_GET['message']);
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
      }

    </style>
</head>

<body>
<iframe src="chat2.php" id="card"></iframe>
<form  action="" method= "get">
<input  class="form-control col-3" type="text" value= "" name="message">
<button class="btn btn-success" type="submit">Envoyer</button>
</form>
</body>
</html>

  <?php echo $_GET['message']?>  
