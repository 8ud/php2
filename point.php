<?php

class Point {

private $x;
private $y;


public function __construct($x,$y)
{
   $this->x= $x;
   $this->y= $y;
}

public function setX($x)
{
   $this->x= $x;
}

public function getX()
{
  return $this->x;
}

public function setY($y)
{
   $this->y= $y;
}

public function getY()
{
  return $this->y;
}

public function deplacement($x,$y)
{
   //$this->x = $this->x + $x;
   //$this->y = $this->y + $y;
   $this->setX($this->getX() + $x);
   $this->setY($this->getY() + $y);
}

public function carre($long)
{
  $point2 = new Point($this->getX()+$long,$this->getY());
  $point3 = new Point($this->getX(),$this->getY()+$long);
  $point4 = new Point($this->getX()+$long,$this->getY()+$long);
  echo $this;
  echo $point2;
  echo $point3;
  echo $point4;
  return [$this, $point2, $point3, $point4];
}

public function distance(Point $Q)
{

   $distance =  sqrt(
      pow (
            $Q->getX()- $this->getX(),2) +
      pow (
            $Q->getY()-$this->getY(),2));
   return $distance;
}

public function __toString()
{

   return "coordonnées du carré : ". $this->getX() . " , " . $this->getY()."</br>";
}
}

class Cercle {

private $centre;
private $diametre;

public function __construct(Point $centre,$diametre)
{
   $this->setCentre($centre);
   $this->setDiametre($diametre);
}

public function setCentre($centre)
{
   $this->centre = $centre;
}

public function getCentre()
{
  return $this->centre;
}

public function setDiametre($diametre)
{
   $this->diametre = $diametre;
}

public function getDiametre()
{
  return $this->diametre;
}

public function surface()
{

   echo "la surface du cercle est de : ";
return pi() * pow($this->getDiametre() / 2, 2);
}

public function perimetre()
{
   return pi() * ($this->getDiametre() / 2) * 2;
}

public function inCercle(Point $p)
{
   if($this->getCentre()->distance($p) <= ($this->getDiametre() /2))
   {
      return true;
   }
   else
   {
      return false;
   }
}





}

$point1 = new Point(2,3);

//$point1->setX(2);
//$point1->setY(3);

var_dump($point1);

$point1->deplacement(3,2);

var_dump($point1);


//$point1->carre(3);
var_dump($point1->carre(3));

//$p = new Point(6,6);
$p1 = new Point(6,6);
$p2 = new Point(3,3);

echo $p1->distance($p2);
echo "<br/>";
echo $p2->distance($p1);
echo "<br/>";
//$cercle = new Cercle(3,4);
//echo $cercle->surface();

$test = new Point(4,7);
$test2 = new Point(12,9);
var_dump($test->carre(4));
echo $test->distance($test2);
echo $test2;
$c = new Cercle($test2, 20);
echo"</br>";
echo $c->surface();
echo"</br>";
echo $c->perimetre();
echo"</br>";

echo"</br>";
echo $c->inCercle($test) ? "dans le cercle" : "à l'extérieur";


