<?php 
declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour03/03-return.php

// facultatif => ton code fonctionne sans cette ligne 
// MAIS tu perds de la fiabilité sur ton code 
// bonne pratique 

function genererPdf( string $titre , string $auteur = "Victor Hugo" ){
    // les variables créées dans une fonction sont LOCALES 
    // elles n'existent pas hors des {} la fonction 
    $date = "01/01/2025";
    $texte = "lorem ipsum" ; 
    // return (mot clé de PHP) permet de récupérer des valeurs qui sont stockées dans la fonction 
    return $date ; 
}

$resultat = genererPdf("pdf1");

// echo $date ; // erreur => PHP va vous dire que la variable n'existe pas ??? => Warning: Undefined variable $date
// pourtant elle est bien écrite 4 lignes au dessus 

echo $resultat ; // je peux récupérer des valeurs créées dans une fonction


// créer le fichier 04-exo.php
/* créer une fonction qui s'appelle min 

2/ cette fonction dispose de deux arguments $a et $b qui sont des entiers

3/ cette fonction dispose de plusieurs instructions :
- si $a est supérieur ou égal  à b retourner la valeur de $b 
- si $a est inferieur strictement à b retourner la valeur de $a

exécuter la fonction min avec les valeurs suivantes 
10 30
20 80
12 1
afficher la valeur minimal dans votre navigateur pour chaque exécution
*/
// 15h50 bonne pause !! 