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

// cas pratique
// créer un nouveau dossier jour06-tp
// dans ce dossier vous avez un fichier index.php et un dossier "vue" qui contient des fichiers de "vue" qui mixe du html et du php 
// vous voulez réaliser une page de connexion avec 2 champs 
// email
// password 

// si l'utilisateur saisit "b@yahoo.fr" et "qwerty" comme identifiants il est dirigé vers une page de gestion de son profil
// si l'utilisateur saisit une autre combinaison d'identifiants il est dirigé vers une page d'erreur 400 => Identifiants invalides  