<?php 

declare(strict_types = 1); 

// en PHP il existe deux types de tableaux 
// indexés
// associatifs

// tableau indexe

$duree = [10,20,50,100] ; 
//         0  1  2  3
// [
// valeur 
// ,
// valeur 
// ...
// ]
// indexé => parce que chaque valeur a une position numérique => index
// 

echo $duree[3] . "<br>";

// tableau associatif 
$presentation = [
    "duree" => 2 ,
    "unite" => "heure",
    "sujet" => "PHP"
];

echo $presentation["unite"]; // utiliser le nom de la clé 

// pour information 
// dans les documentations officielles de PHP

$infos = array( 1,2,3,4 ); // ancienne notation pour créer un tableau indexé
$infos = [ 1,2,3,4 ]; // ancienne notation

$etudiants = array( 
    "nom" => "Alain",
    "age" => 24
);

$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');

// équivalent

$a = ['green', 'red', 'yellow'];
$b = ['avocado', 'apple', 'banana'];

// les opérations sur les tableaux 
// CRUD 
// découvrir des fonctions natives de PHP 

// https://www.php.net/manual/fr/ref.array.php
// 
