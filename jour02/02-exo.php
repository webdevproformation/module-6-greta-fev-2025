<?php 

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/02-exo.php

// 2 >= 2
$a = 2 >= 2 ;
var_dump($a); // TRUE 

$b = "a" == "ab" ;
var_dump($b); // FALSE

$c = 2 != 3 && 10 < 33 ;
//    TRUE  &&  TRUE
//       TRUE
var_dump($c); 

$d =  "hello" > "bonjour" ; 
//     conversion en binaire des lettres
//    h => 68 et b => 62
//      TRUE
var_dump($d); 

$e =  2 ==  "2" ;
//    "2" == "2" (transtypage => PHP va essayer de mettre le même type des deux côtés )
//     TRUE 
var_dump($e); // TRUE

$f =  2 === "2";
//     FALSE 
var_dump($f);  // FALSE 

$g =  (2 != 5 && 3 > 4 ) || 2 <= 14  ;
//    ( TRUE  &&  FALSE) ||  TRUE
//           FALSE       ||  TRUE 
//               TRUE
var_dump($g);

$h =  2 != 5 && ( 3 > 4  || 2 <= 14 )  ;
//    TRUE   &&  ( FALSE  ||  TRUE  )
//    TRUE   &&  TRUE
//    TRUE   
var_dump($h);

$i = 2 != 5 && 3 > 4  || 2 <= 14  ;
//    TRUE  &&  FALSE  ||  TRUE   => && et || le && est prioritaire sur le ||
//         FALSE       ||  TRUE
//      TRUE
var_dump($i);