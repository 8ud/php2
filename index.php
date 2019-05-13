<?php

class Chaine {

   private $chaine;
   private $chaine2;
   private $avant;
   private $apres;

   public function setChaine($arg)
   {
      $this->chaine = $arg;  //this pour acceder aux objets que l'on manipule
      $this->setChaine2($arg);

   }

   public function setChaine2($arg)
   {
      $this->chaine2 = $arg;
   }

   public function getChaine()
   {
      return $this->chaine;
   }

   public function getChaine2()
   {
      return $this->chaine2;
   }

   public function gras()
   {
      $this->avant .="<strong>";
      // $this->avant = $this->avant . "<strong>";
      $this->apres .="</strong>";
    //~  $this->setChaine2("<strong>".$this->getChaine2()."</strong>");
      return $this;
   }

   public function italique()
   {
      $this->avant .="<i>";
      $this->apres .="</i>";
      // $this->setChaine2 ("<i>".$this->getChaine2()."</i>");
       return $this;
   }

   public function souligne()
   {
      $this->avant .="<u>";
      $this->apres .="</u>";
      // $this->setChaine2 ("<u>".$this->getChaine2()."</u>");
       return $this;
   }

   public function couleur()
   {
      $this->avant .="<font color=\"red\">";
      $this->apres .="</font>";
       // $this->setChaine2 ("<font color=\"red\">".$this->getChaine2()."</font>");
        return $this;
   }

   public function majuscule()
   {
       $this->setChaine2("<div style=\"text-transform: uppercase;\">".$this->getChaine2()."</div>");
       return $this;
   }

   public function compte()
   {
      $tab = explode(' ',$this->getChaine());
      $this->setChaine2("<br/>Nombre de mots avec explode : ".count($tab));
      return $this;
   }

   public function __toString()
   {
      return $this->avant . $this->getChaine2() . $this->apres;
   }

}


$machaine = new Chaine();

$machaine->setChaine("Hello");

$machaine->souligne();
$machaine->__toString();
echo "<br/>";
$machaine->gras();
echo "<br/>";
$machaine->couleur();
$machaine->__toString();
echo "<br/>";
$machaine->italique();
echo "<br/>";
$machaine->majuscule();
echo "<br/>";
$machaine->compte();
echo "<br/>";

$chaine2 = new Chaine();
$chaine2->setChaine('Bonjour');
echo "<br/>";
echo $chaine2->souligne();
echo "<br/>";
echo $chaine2->gras();
echo "<br/>";
echo $chaine2->couleur();
echo "<br/>";
$chaine2->majuscule();
echo $chaine2->compte();
//$chaine2->__toString();

echo "<br/>";
$chaine3 = new Chaine();
$chaine3->setChaine('Salut');
echo $chaine3->souligne()->couleur()->majuscule();
//$chaine3->__toString();

