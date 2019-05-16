<?php

   $r = new Redis();
   $r->connect('172.20.255.210'); // connexion a redis
   $r->select(7);

   if(isset($_GET['page'])){

      $page = $_GET['page'];
   }
   else
   {
      //chois de la page par defaut
      $page=0;
   }

   if($r->exists('page' . $page))
   {
      echo $r->get('page' . $page);
      echo "<br/>";
      echo "From Redis";
   }
   else
   {


      ob_start();
      require 'outils.php';

      $m= new PDO('mysql:host=172.20.255.34;dbname=score', 'score', 'score');



      $from = 'rien';

      echo "<h1>Page : $page </h1>";

      echo lien("?page=". ($page -1),"préc");
      echo " - ";
      echo lien("?page=". ($page +1),"suiv");

      echo "<br/>";


      $debut= $page * 10;
      $tableau= $m->query('SELECT * from score order by score desc limit '. $debut .',10'); //requete mysql


      //  var_dump($tableau);
      foreach($tableau as $ligne)
      {
         echo "Username : " .$ligne['login'];
         echo " - ";
         echo "Score : " .$ligne['score'];
         echo "<br/>";
      } // affiche le contenu de mysql



      $html = ob_get_clean();
      echo $html;
      echo "<br/>";
      echo "From MySQL";

      $r->set('page' . $page, $html);
   }


      // echo "<br/>";
      // echo "apres ob_start";

      // if($score->exists('page'))
      // {
         // echo $score->get('page');
      // }
      // else {
         // $score->set('page',$html); //enregistrement de page dans redis
      // }



      //echo $html;