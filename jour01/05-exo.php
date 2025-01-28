<?php 

// ! attention à votre adresse 
// http://192.168.33.10/jour01/05-exo.php

$a = 12 ;
$b = 0 ;
$c = -2.5 ; 


echo $a / $c . "<br>"; 
echo $a * $c + $a . "<br>"; 
echo $a * ( $c + $a ) . "<br>";
// echo $a / $b ; 
try{
    echo $a /$b ;
}catch(DivisionByZeroError $e){
    echo $e->getMessage() . "<br>"; 
}
try{
    echo $c /$b ;
}catch(DivisionByZeroError $e){
    echo "Attention le calcul implique une division par 0 ce qui est impossible <br>"; 
}
$aireCercle = 3.14 * 5 ** 2 ;
echo $aireCercle . "<br>" ; 

echo $aireCercle = M_PI * 5 ** 2 ;