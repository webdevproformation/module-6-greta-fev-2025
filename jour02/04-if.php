<?php 

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/04-if.php

// if(){}
// if mot clé du langage PHP 

if( 30 > 10  ){
//  TRUE   
    // alors PHP exécuter les opérations / traitements qui sont écrites dans les {} du if
    echo "la condition est vraie <br>" ; 
}

if ( 30 < 10 ){
//  FALSE
    // étant donné que la condition est FALSE => les instructions entre les {} sont ignorées par PHP
    echo "la condition2 est vraie <br>" ; 
}


$age = 18 ;

if($age < 20){
    echo "vous êtes mineur <br>";
}elseif( $age < 80 ){
    echo "vous êtes majeur <br>";
}elseif($age < 120){
    echo "vous êtes retraité <br>";
}else {
    echo "age invalide <br>";
}

/**
créer le fichier 05-exo.php 

// ce fichier contient trois variables

// $a = 30
// $b = 40
// $c = 12 * 4 < 44/3

// 1/ vérifier : est ce que $a supérieur ou égal à $b
// si c'est vrai écrire dans le navigateur "verif 1 ok"

// 2/ vérifier : est ce que $c supérieur ou égal à $b
// si c'est vrai écrire dans le navigateur "verif 2 ok"

// 3/vérifier : est ce que $c supérieur ou égal à $b OU $a inférieur à $b
// si c'est vrai écrire dans le navigateur "verif 3 ok"

 */

