<?php 

// commentaire
# commentaire
/* un commentaire !!   */

// créer une variable $surface qui contient le chiffre 250 
// int (chiffre entier)
$surface = 250 ;

// float (chiffre à virgule)
$remise = 0.2 ; 

// string => stocker du texte dans une variable 

$auteur = "Victor Hugo" ; // utiliser les guillemets
$pays = 'France' ; // utiliser les apostrophes 

// boolean => logique

$estPresent = TRUE ; 
$estPresent2 = true ; 
$estAbsent = FALSE ; 

// tableau 
// indexé

$salaires = [10000, 15000, 5000];
$jours = ["lundi", "mardi" , "mercredi"] ; 

// associatif

$etudiant = [
    "nom" => "Alain",
    "age" => 22 ,
    "isAdmin" => FALSE 
] ;

// objet => en PHP il faut créer d'abord une class pour créer un objet 

class A {} ;
$a = new A() ; 

// c'est la variable $a qui est l'objet 