<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour03/04-exo.php

// permet de savoir comment utiliser la fonction
// savoir ce que tu peux récupérer 
// SANS voir ce qui est dans la fonction (les instructions)
function myMin( int $a , int $b ) : string{
    if($a >= $b){
        return $b . "<br>";
    }else {
        return $a . "<br>";
    }
}

echo myMin(10 ,30);
echo myMin(20 ,80);
echo myMin(12 , 1);