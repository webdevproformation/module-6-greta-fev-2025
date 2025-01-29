<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour03/05-scope.php
// la variable $unite est une variable globale
// on peut utiliser cette variable hors de la fonction MAIS aussi DANS la fonction 
$unite = "euro" ; 

function creer(string $titre) : string
{
    // $variable est variable locale => disponible UNIQUEMENT dans la fonction 
    global $unite ; // utilise une variable qui a été créée dans le contexte global 
    $variable = "je viens de créer un texte"; 
    return $variable . $unite ; 
}

echo creer("article1") ; // 

