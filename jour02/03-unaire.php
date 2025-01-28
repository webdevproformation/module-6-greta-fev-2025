<?php 

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/03-unaire.php

// concaténation avec 3 variables 
$prenom = "Victor" ;
$nom = "Hugo" ; 
$nomComplet = $prenom . " " . $nom ; 
echo $nomComplet . "<br>";

// je vais faire la même concaténation MAIS avec 1 seule variable 

$auteur = "Victor" ;
$auteur = $auteur . " ";
$auteur = $auteur . "Hugo";
echo $auteur . "<br>"; 

// opérateur unaire .= (qui permet de réaliser de la concaténation)

$auteur = "Victor" ;
$auteur .= " ";
$auteur .= "Hugo";
echo $auteur . "<br>"; 

// ----------

$a = 10 ;
$b = 30 ;
$c = $a + $b ;
echo $c . "<br>"; 

$d = 10 ;
$d = $d + 30 ; 
echo $d . "<br>" ; 

$d = 10 ;
$d += 30 ; 
echo $d . "<br>" ; 


$f = 10 ; 
$f = $f + 1 ; 
$f += 1 ;  // +=
$f++ ;     // ++ 

/**
 * js
 for(let i = 0 ; i < 10 ; i++){
 }
 php 
 for($i = 0 ; $i < 10 ; $i++){
 }
 py
 for i in range(0,10):
    pass 
 * 
 */

 $chiffre = 20 ;
 $chiffre = $chiffre - 10 ;
 echo $chiffre . "<br>"; // 10 
 $chiffre -= 10 ;
 echo $chiffre . "<br>"; // 0 

 // ! est aussi un opérateur unaire 

// 3 structures : => permet à votre code de s'exécuter dans un ordre différent du ligne par ligne 

// condition if 
// boucle for / while
// fonction 