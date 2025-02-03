<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06-poo/02-exo.php

class Formation{
    public string $nom = "DWWM";
    public int $duree = 6 ;
    public string $unite = "mois";
    public array $competences = ["PHP","HTML","CSS"] ;
}

$f = new Formation();

echo $f->unite . "<br>";
echo $f->competences[2] ; 