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
