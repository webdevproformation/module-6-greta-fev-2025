<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06/index.php

// base de données
/* $connexion = new PDO("url bdd" , "..." , "...");
$stmt = $connexion->prepare("SELECT * FROM user WHERE login = :login AND password = :password");
$profil = $stmt->execute( [ "login" => $_POST["login"] , "password" => $_POST["password"]] ); */

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

    // var_dump($_POST); 
    // die(); 

    // logique ... => verifier est ce que les identifiants sont valides 
    if($_POST["login"] === $profil["login"] && $_POST["password"] === $profil["password"]){

        require_once "vue/header.php";
        require_once "vue/profil.php";
        require_once "vue/footer.php";
    }else {
        require_once "vue/header.php";
        require_once "vue/400.php"; // erreur 400 Bad Credentials
        require_once "vue/footer.php";
    }

    
}