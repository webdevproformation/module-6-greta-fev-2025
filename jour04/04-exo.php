<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour04/04-exo.php

$favoris = [
    "https://www.google.fr" ,
    "https://fr.wikipedia.org" ,
    "http://fr.yahoo.com" 
];

// ajouter à la fin 
$favoris[] = "https://www.grafikart.fr/"; 

// ajouter au début
array_unshift($favoris, "https://www.w3schools.com/");

// modifier la valeur du deuxieme elements
$favoris[1] = "https://developer.mozilla.org";

// supprimer le 3ème element du tableau
//unset($favoris[2]);
array_splice($favoris , 2, 1) ; 

// supprimer le dernier élément du tableau
array_pop($favoris);

var_dump($favoris); 