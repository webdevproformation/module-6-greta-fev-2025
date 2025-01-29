<?php 

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour03/02-exemple.php

$etudiants = [
    [
        "nom" => "Alain",
        "age" => 12
    ],
    [
        "nom" => "Zorro",
        "age" => 18
    ]
];
function addMajeur($etudiant){
    $etudiant["majeur"] = $etudiant["age"] >= 18 ? TRUE : FALSE ;
    return $etudiant ;
}
// permet de transformer un tableau 
$etudiants2 = array_map( "addMajeur" , $etudiants);
var_dump($etudiants2);

/* $etudiants2 = [
    [
        "nom" => "Alain",
        "age" => 12,
        "majeur" => FALSE
    ],
    [
        "nom" => "Zorro",
        "age" => 18 ,
        "majeur" => TRUE
    ]
]; */