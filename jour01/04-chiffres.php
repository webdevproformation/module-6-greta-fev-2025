<?php 

// ! attention à votre adresse 
// http://192.168.33.10/jour01/04-chiffres.php

$a = 10 ;
$b = 30 ; 

// on peut affection les 6 opérations de base 
// addition
$c = $a + $b ;
echo $c . "<br>" ;  // 40

echo $a + $b  . "<br>" ;  // 40

// soustraction
echo $a - $b . "<br>"; // -20

// division
echo $a / $b . "<br>"; // 0.33333333333333

// multiplication
echo $a * $b . "<br>"; // 300

// modulo
echo $a % $b . "<br>" ;  // 10

// puissance 
echo $a ** $b . "<br>"; // 1.0E+30 // 10 puissance 30

echo PHP_INT_MAX . "<br>"; // 9 223 372 036 854 775 807

// Fatal error: Uncaught DivisionByZeroError: Division by zero
// echo 10 / 0 ; 


$prix = 10 ;
$promotion = "30";  

echo $prix + $promotion . "<br>"; 

$distance = "20km" ;
$duree = "30min";  

echo $distance + $duree ; // ça fonctionne (avec un message Warning) car le chiffre est mis au début des strings 


/**

cas n°1 :

    créer le fichier 05-exo.php
    Ce fichier contient 3 variables :
        $a ayant la valeur 12
        $b ayant la valeur 0
        $c ayant la valeur -2,5
    effectuer les calculs suivants et afficher leurs résultats dans le navigateur
        $a / $c
        $a * $c + $a
        $a * ( $c + $a )
        $a / $b
        $c / $b

cas n°2 :

    créer un nouveau fichier php
    Donner l'aire d'un cercle ayant un rayon de 5 cm
     
    rappel, la formulaire du l'aire d'un cercle est Pi (3.14) x rayon²


 * 
 */