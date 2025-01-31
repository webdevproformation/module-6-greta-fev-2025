<?php 

// dans le fichier index.php 
// empty()
// isset()
// require_once 

// empty() fonction qui permet de savoir si une variable contient du vide 
$a = "";
$b = 0 ; 
$c = [] ;  
var_dump(empty($a)); // TRUE 

$d = " "; 
$e = -10 ; 
$f = [ 1 ] ; 
var_dump(empty($d)); // FALSE 

// isset() est une fonction qui vérifie si une variable EXISTE 

var_dump(isset($g)); // FALSE 

$etudiant = [ 
    "nom" => "Alain"
];

var_dump(isset($etudiant["age"])); 


// require_once permet de découper un fichier php en plusieurs fichiers
// copier coller 

// dans le fichier pays.php 

// $pays_visite = $page_appelee["pays"] == "fr" ? "France" : "Espagne"

// if ternaire

$total = 10 + 2 ; // le symbole + opérateur binaire 
$test = !(2>3) ; // ! opérateur unaire 
// ? : // opérateur ternaire 

$age = 18 ;

if($age < 18){
    echo "vous êtes mineur";
}else {
    echo "vous êtes majeur"; 
}

echo ($age < 18) ?"vous êtes mineur" :"vous êtes majeur" ;