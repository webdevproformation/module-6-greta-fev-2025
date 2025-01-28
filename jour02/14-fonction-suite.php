<?php 

declare(strict_types=1); // rend les typehint OBLIGATOIRE ! 

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/14-fonction-suite.php

function addition()
{
    $a = 20 ;
    $b = 30 ;
    echo $b + $a . "<br>";
}

function addition2()
{
    $a = 5 ;
    $b = 10 ;
    echo $b + $a . "<br>";
}

// type hinting (7.3 de PHP)
function add(int $a , int $b){ // fonction add() qui a deux paramètres 
    echo $b + $a . "<br>";
}

add(5,10); // au moment de l'exécution de la fonction que l'on donne des valeurs aux paramètres

add(12.3, 22) ; 

/*
cas pratique
Créer le fichier 15-exo.php

1/ déclarer une fonction aireCercle 

2/ cette fonction dispose d'un argument $rayon

3/ cette fonction contient deux instructions :
- déclarer la variable $resultat = 3,14 * rayon * rayon
- afficher dans le navigateur la phrase suivante :
l'aire d'un cercle de rayon $rayon a une aire de $resultat

4/ exécuter la fonction aireCercle pour le $rayon
44,5
70,43


*/