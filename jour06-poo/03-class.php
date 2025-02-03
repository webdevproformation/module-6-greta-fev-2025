<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06-poo/03-class.php

class Cercle 
{
    // rayon est une PROPRIETE de la class Cercle 
    public float $rayon = 12.5  ;

    // surface est une METHODE de la class Cercle 
    public function surface(): int 
    {
        return 20 ; 
    }

    public function perimetre():float
    {
        return 2 * 3.14 * $this->rayon ; 
        // $this mot clé du langage PHP 
        // attention il faut respecter son $this en minuscule 
        // permet d'accéder aux propriétés de l'objet 
    }
}

$c = new Cercle();

echo $c->rayon . "<br>";

echo $c->perimetre(); // exécuter une méthode 
