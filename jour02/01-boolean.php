<?php 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/01-boolean.php
// IL FAUT que virtual Box soit démarré
// Vagrant soit démarré 

// vagrant up 
// vagrant halt

echo "boolean <br>";
$a = TRUE ;
$b = FALSE ; 
$c = 10 > 5 ; 
echo $c . "<br>";  // echo d'un boolean TRUE => 1
$d = 10 < 5 ;
echo $d . "<br>"; // $d contient la valeur FALSE MAIS ça affiche rien
var_dump($d); // fonction de débuggage (comme console.log() en js)


// comme pour les chiffres on peut faire des opérations booleans
// sur plusieurs comparaisons 
$e = 20 > 5 && 10 < 30 ; 
//    TRUE  &&  TRUE
//        TRUE

var_dump($e); 
// && => ET / AND 

$f = 20 < 5 && 10 < 30 ;
//   FALSE  && TRUE
//       FALSE 
var_dump($f); 

$g = 20 > 5 && 10 > 30 ;
//    TRUE  &&  FALSE 
//         FALSE 

$h = 20 < 5 && 10 > 30 ;
//     FALSE && FALSE 
//          FALSE

// --------------------------

//    || OU ou le OR en anglais

$i = 30 > 5 || 20 > 10 ;
//  TRUE    ||  TRUE
//       TRUE 

$j = 30 < 5 || 20 > 10 ;
//   FALSE  ||  TRUE 
//        TRUE 

$k = 30 > 5 || 20 < 10 ;
//    TRUE  ||  FALSE
//        TRUE 

$l = 30 < 5 || 20 < 10 ;
//    FALSE || FALSE
//        FALSE 

// --------------------------

// ! NOT 

$m = !(20 > 10) ;
//   !( TRUE )
//    FALSE 

$n = !(20 < 10) ;
//   !( FALSE )
//   TRUE 


// Bonus => je ne l'utiliserai pas en cours !!


$o = 20 < 5 AND 10 < 30 ;
var_dump($o);
$p = 20 < 5 OR 10 < 30 ;
var_dump($p);
$q = 20 < 5 XOR 10 < 30 ;
var_dump($q);

/*
Cas pratique 
créer le fichier 02-exo.php dans le dossier jour02

pour chaque opération boolean suivante est ce que le résultat est 
TRUE ou FALSE 

2 >= 2
"a" == "ab"
2 =! 3 && 10 < 33
"hello" > "bonjour" 
2 ==  "2"
2 === "2"
(2 != 5 && 3 > 4 ) || 2 <= 14 
2 != 5 && ( 3 > 4  || 2 <= 14 ) 
2 != 5 && 3 > 4  || 2 <= 14  


*/ 