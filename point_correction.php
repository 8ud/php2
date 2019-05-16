<?php
class Point
{
        private $x;
        private $y;
        
        public function __construct($x=0,$y=0)
        {        
                $this->setX($x);
                $this->setY($y);
        }

        public function setX($x)
        {
                $this->x = $x;
        }
        
        public function setY($y)
        {
                $this->y = $y;
        }

        public function getX()
        {
                return $this->x;
        }
        
        public function getY()
        {
                return $this->y;
        }
        
        public function move($x, $y)
        {
                $this->setX($this->getX() + $x);
                $this->setY($this->getY() + $y);
        }
        
        public function carre($l)
        {
                if(is_int($l))
                {
                        if($l > 0)
                        {
                                //$this est le point en bas à gauche
                                $pbg = $this;
                                $pbd = new Point($this->getX() + $l, $this->getY());
                                $phg = new Point($this->getX(), $this->getY() + $l);
                                $phd = new Point($this->getX() + $l, $this->getY() + $l);
                                return [$pbg,$pbd,$phg,$phd];
                        }
                }
        }
        
        public function distance(Point $p)
        {
                //vérifier le type de $point
                $distance = sqrt(pow($p->getX() - $this->getX(), 2) + pow($p->getY() - $this->getY(), 2));
                return $distance;
        }
        
        public function __toString()
        {
                return "<pre>x = " . $this->getX() . "\n" . "y = " . $this->getY() . "</pre>";
        }
        
}

class Cercle 
{
        private $centre;
        private $diametre;
        
        public function __construct(Point $centre, $diametre)
        {        
                $this->setCentre($centre);
                $this->setDiametre($diametre);
        }

        public function setCentre(Point $centre)
        {
                $this->centre = $centre;
        }
        
        public function setDiametre($diametre)
        {
                $this->diametre = $diametre;
        }
        

        public function getCentre()
        {
                return $this->centre;
        }
        
        public function getDiametre()
        {
                return $this->diametre;
        }
        
        public function surface()
        {
                // pi x R²
                return pi() * pow($this->getDiametre() / 2, 2);
        }
        
        public function perimetre()
        {
                // 2 x pi x R
                return pi() * ($this->getDiametre() / 2) * 2;
        }
        
        public function inCercle(Point $p)
        {
                //~ $p->distance($p,$this->getCentre());
                if($this->getCentre()->distance($p) <= ($this->getDiametre() / 2))
                {
                        return True;
                }
                else
                {
                        return False;
                }
        }
}


$test = new Point(4,7);
$c = new Cercle($test, 20);

echo $c->getCentre();








$test2 = new Point(12,9);

var_dump($test->carre(4));
echo $test->distance($test2);
echo $test2;

echo "<br/>";
echo $c->surface();
echo "<br/>";
echo $c->perimetre();
echo "<br/>";
echo $c->inCercle($test) ? "dans le cercle" : "à l'extérieur";

//~ $point->distance($point, $point2);
