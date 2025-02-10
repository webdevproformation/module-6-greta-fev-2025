<?php 
$page = ""; 
// http://192.123.123.123/index.php?page=home
if(isset($_GET["page"]) && !empty($_GET["page"])){
    $page = $_GET["page"];
}else{
    // alors afficher la page d'accueil 
    $page = "/"; 
}
// tableau associatif qui fait le lien entre 
// la page demandée ET le Controlleur 
// début du routeur 
$routes = [
    "/" => "home", // méthode qui est dans un Controller 
    "presentation" => "presentation", // si dans le $_GET["page"] == "presentation" => exécuter la méthode 
                                     // presentation dans la class FrontController 
    "contact" => "contact",
    "connexion" => "connexion"
]; 

require_once "Model/BDD.php";
// var_dump(BDD::getInstance()); 
require_once "Controller/FrontController.php"; 


if(array_key_exists($page , $routes)){
    $p = new FrontController();
    $p->{$routes[$page]}();
}
// http://192.168.33.10/jour10/index.php