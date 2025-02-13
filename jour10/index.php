<?php 

session_start(); 

function flash(){
    if(isset($_SESSION['flash'])) {
        $message = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $message ; 
    }
}

define("URL", "http://192.168.33.10/jour10/index.php");


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
    "/" => ["home",  "FrontController"],
    "presentation" => ["presentation",  "FrontController"],
    "contact" => ["contact", "FrontController"],
    "connexion" => ["connexion", "FrontController"],
    "inscription" => ["inscription", "FrontController"],
    "admin/dashboard" => ["dashboard", "BackController"],
    "deconnexion" => ["deconnexion", "FrontController"],
    "erreur401" => ["erreur401", "ErreurController"],
    "admin/projet" => ["projet_index" , "BackController"],
    "admin/user" => ["user_index" , "BackController"],
    "admin/projet/new" => ["projet_new" , "BackController"],
    "admin/projet/delete" => ["projet_delete" , "BackController"],
    "admin/projet/update"  => ["projet_update" , "BackController"],
    "admin/user/new" => [ "user_new" , "BackController" ],
    "admin/user/delete" => ["user_delete", "BackController"]
]; 

require_once "Model/BDD.php";
// var_dump(BDD::getInstance()); 
require_once "Controller/AbstractController.php"; 
require_once "Controller/FrontController.php"; 
require_once "Controller/ErreurController.php"; 
require_once "Controller/BackController.php"; 


if(array_key_exists($page , $routes)){
    $class = $routes[$page][1];
    $method = $routes[$page][0];
    $p = new $class();
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    call_user_func([$p, $method] , $id);
    //$p->{$method}();
}else {
    $p = new ErreurController();
    $p->erreur(404 , "la page demandée n'existe pas");
}

// http://192.168.33.10/jour10/index.php