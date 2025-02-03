<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06-tp/index.php

session_start(); 

$etudiant = [
    "email" => "b@yahoo.fr",
    "password" => "qwerty"
];

$page_demandee = $_GET ; 

if(empty($page_demandee)){
    // afficher la page d'accueil
    require_once "vue/header.php";
    require_once "vue/home.php";
    require_once "vue/footer.php";
}else if(isset($page_demandee["page"]) && $page_demandee["page"] === "profil"){

    if($_POST["email"] === $etudiant["email"] && $_POST["password"] === $etudiant["password"]){
        unset($_SESSION["erreur"]);
        // afficher la page de profil 
        require_once "vue/header.php";
        require_once "vue/profil.php";
        require_once "vue/footer.php";
    }else {
        $_SESSION["erreur"] = "identifiants invalides" ; 
        // afficher la page d'erreur 400
       /*  require_once "vue/header.php";
        require_once "vue/400.php";
        require_once "vue/footer.php"; */
        header("Location: http://192.168.33.10/jour06-tp/index.php"); 
    }
}

