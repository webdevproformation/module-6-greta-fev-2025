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

// créer le fichier 04-exo.php
// dans ce fichier vous allez créer une class qui s'appelle Exo
// cette class contient 2 propriétés
// note qui vaut 10
// etudiant qui vaut "Alain"
// cette contient une méthode presentation
// cette méthode fait la concaténation de note et Alain
// elle retourne le texte suivante "Alain a eu une note de 10 / 20 ;

// créer un objet $e à partir de la class Exo
// exécuter la méthode presentation est affichée le résultat sur la navigateur 


class A{

    public static $instance = 10 ;
}

A::$instance ; 