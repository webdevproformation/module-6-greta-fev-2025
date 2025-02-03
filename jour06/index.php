<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06/index.php

// base de données
$profil = [
    "login" => "a@yahoo.fr",
    "password" => "azerty"
];

// quelle page ??
$page_demandee = $_GET ; 

// conditions

if(empty($page_demandee)){
    // page d'accueil
    require_once "vue/header.php";
    require_once "vue/home.php";
    require_once "vue/footer.php";
}else if(isset($page_demandee["page"])){
    // page de profil 

    // logique ... => verifier est ce que les identifiants sont valides 

    require_once "vue/header.php";
    require_once "vue/profil.php";
    require_once "vue/footer.php";
}