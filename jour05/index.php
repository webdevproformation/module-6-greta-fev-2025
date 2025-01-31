<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour05/index.php

// tableau qui est pour l'instant notre BDD 
// variable globale
require_once "bdd.php" ; 

$page_appelee = $_GET ; 

// http://192.168.33.10/jour05/index.php 
// $_GET = []
// http://192.168.33.10/jour05/index.php?pays=fr
// $_GET = ["pays" => "fr"]
// http://192.168.33.10/jour05/index.php?pays=es
// $_GET = ["pays" => "es"]
// var_dump($page_appelee); 


if(empty($page_appelee)){
    // si la variable $page_appelee est une tableau vide 
    // gérer la page d'accueil du site 
    // var_dump("je dois afficher la page d'accueil");
    require_once "header.php";
    require_once "home.php";
    require_once "footer.php";
}
else if(isset($page_appelee["pays"])){
    // afficher la page du pays concerné
    //var_dump("je dois afficher une page pays");
    require_once "header.php";
    require_once "pays.php";
    require_once "footer.php";
}
