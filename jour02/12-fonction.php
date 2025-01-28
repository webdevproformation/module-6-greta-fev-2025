<?php 

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/12-fonction.php

// variable permet de stocker une ou plusieurs valeurs 
$a = 32 ; 

// fonction permet de stocker une ou plusieurs instructions 

function a(){
    $prix = 10 ;
    $tva = 1.2 ;
    echo $prix * $tva ; 
    for($i = 0 ; $i < 1; $i++){

    }
    if(10 > 30){

    }
}
// la variable a stocke les 3 instructions 

function surface()
{
    $a = 10 ;
    $b = 30 ;
    echo $a * $b ; 
}

// une fois que l'on a créé la fonction 
// SI on veut exécuter les instructions stockées dans la fonction IL FAUT APPELER la fonction / EXECUTER la fonction

surface(); 

/**
créer le fichier 13-exo.php 

// ce fichier contient deux fonctions 

// 1/fonction addition 
// contient trois instructions 
// créer la variable $a : 20
// créer la variable $b : 30
// afficher dans le navigateur $b + $a

// 2/ fonction soustraction
// contient trois instructions 
// créer la variable $a : 15,4
// créer la variable $b : 223
// afficher dans le navigateur $a - $b

// 3/ exécuter ces deux fonctions 
 * 
 */