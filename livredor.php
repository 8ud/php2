<?php
ob_start();
$page = "";
$message = new Redis();
$message->connect('172.20.255.210');
if(isset($_GET['message'])){
   if ($_GET['message'] != "") {
      echo "essai1";
      $message->rpush('message',$_GET['message']);
      header("location: livredor.php ");
   }
}
 if(isset($_GET['supprimer'])){
   $message->del('message');
   $message->set('connect', 0);
  }
  if(isset($_GET['suppmess'])){
     $message->lpop('message');
    // header("Location: livredor.php ");
  }
  if(isset($_GET['page'])){
   $debut = $_GET['page']*10;
   $fin = $debut +9;
for($i=1; $i<=$_GET['page']; $i++){
     $tab = $message->lrange('message', $debut , $fin);

    $page = "<li class=\"page-item\"><a class=\"page-link\" href=\"livredor.php?page=".$_GET['page']."\">".$_GET['page']."</a></li>";

}
  }else {
     
     $tab = $message->lrange('message', '0' , '9');
     $page = "<li class=\"page-item\"><a class=\"page-link\" href=\"livredor.php\">1</a></li>";

  }
  $tableau = $message->lrange('message', '0' , '-1');
  foreach($tableau as $key =>$value ){
     echo $key;
  }
 //var_dump($_REQUEST);

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
       margin-bottom : 30px;
       margin-top : 30px;
       width : 500px;
      height : 400px;
      }

      .btn{
       margin : 15px;
      }

    </style>
</head>

<body>
<div  id="card"><?php foreach ($tab as $key => $value) {
   echo $value ;
   echo "<br/>";
}

?></div>
<form  action="" method= "get">
<input  class="form-control col-4 offset-4" type="text" name="message">
<button class="btn btn-success" type="submit">Envoyer</button>
<button class="btn btn-danger" type="submit" name="supprimer">Supprimer</button>
<button class="btn btn-warning" type="submit" name="suppmess">Supp Message</button>
</form>
<?php echo 'nombre de messages : ' . $message->llen('message');
 echo "<br/>";
 echo 'nombre de connexions : ' . $message->incr('connect');
 echo "<br/>";
 


ob_flush();
 ?>
 <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
              </a>              
    </li>
   
    <?php echo $page ?>
    
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</body>
</html>