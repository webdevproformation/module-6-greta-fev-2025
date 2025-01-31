<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour05-get/index.php

// charger mon tableau

$annuaire = [
    "Alain" => [
        "phone" => "0606060606" , 
        "email" => "a@yahoo.fr" , 
        "adresse" => [ 
            "75 rue de Paris" , 
            "75000", 
            "Paris"  
        ]   
    ],
    "Zorro" => [
        "phone" => "0606060607" , 
        "email" => "z@yahoo.fr" , 
        "adresse" => [ 
            "80 rue de Paris" , 
            "75000", 
            "Paris"  
        ]   
    ],
];

$page_appelee = $_GET ; 

if(empty($page_appelee)){
    // page d'accueil
    require_once "vue/header.php";
    require_once "vue/home.php";
    require_once "vue/footer.php";
}elseif(isset($page_appelee["etudiant"])){
    // page d'un étudiant 
    require_once "vue/header.php";
    require_once "vue/etudiant.php";
    require_once "vue/footer.php";
}