<?php 

session_start(); 

define("URL", "http://192.168.33.10/fils_rouge/index.php");

$page = ""; 
if(isset($_GET["page"]) && !empty($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = "/"; 
}

$routes = [
    "/" => ["home",  "FrontController"],
    "single" => ["single",  "FrontController"],
    "mention-legale" => ["mention_legale", "FrontController"],
    "connexion" => ["connexion", "FrontController"],
    "inscription" => ["inscription", "FrontController"],
    "deconnexion" => ["deconnexion", "FrontController"],
    "erreur401" => ["erreur401", "ErreurController"],
    "erreur403" => ["erreur403", "ErreurController"],
    "admin/dashboard" => ["dashboard", "BackController"],

    "admin/recettes" => ["index" , "BackRecetteController"],
    "admin/recettes/new" => ["new" , "BackRecetteController"],
    "admin/recettes/delete" => ["delete" , "BackRecetteController"],
    "admin/recettes/update"  => ["update" , "BackRecetteController"],

    "admin/categories" => ["index" , "BackCategorieController"],
    "admin/categories/new" => ["new" , "BackCategorieController"],
    "admin/categories/delete" => ["delete" , "BackCategorieController"],
    "admin/categories/update"  => ["update" , "BackCategorieController"],

    "admin/commentaires" => ["index" , "BackCommentaireController"],
    "admin/commentaires/delete" => ["delete" , "BackCommentaireController"],
    "admin/commentaires/update"  => ["update" , "BackCommentaireController"],

    "admin/user" => ["index" , "BackUserController"],
    "admin/user/new" => [ "new" , "BackUserController" ],
    "admin/user/delete" => ["delete", "BackUserController"],
    "admin/user/update" => ["update" , "BackUserController"]
]; 

require_once "Utils/functions.php";
require_once "Model/BDD.php";
// var_dump(BDD::getInstance()); 
require_once "Controller/AbstractController.php"; 
require_once "Controller/FrontController.php"; 
require_once "Controller/ErreurController.php"; 
require_once "Controller/BackController.php"; 
require_once "Controller/BackUserController.php"; 
require_once "Controller/BackCategorieController.php"; 
require_once "Controller/BackRecetteController.php"; 
require_once "Controller/BackCommentaireController.php"; 


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