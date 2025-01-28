<?php 

declare(strict_types=1);

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/16-fonction-suite.php

function calcul( int $a , string $b ){
    echo "$a en $b <br>";
}

// pour exécuter la fonction calcul (méthode 1)
calcul(10, "euros" );

// spécial PHP  => exécuter une variable  
$nomFonction = "calcul" ; // créer une variable dans laquelle on stocker du texte !
$nomFonction(30 , "centimes");
// exécuter notre variable 

// dans PHP il y a des fonctions qui permettent d'exécuter des fonctions 

call_user_func("calcul", 5 , "km");

call_user_func_array("calcul" , [30 , "secondes"]);

var_dump(1,2,3);