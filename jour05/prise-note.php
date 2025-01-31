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

// cas pratique
// vous voulez créer un petit site de type annuaire 
// votre annuaire contient les informations suivantes 
/**
$annuaire = [
    "Alain" => [
        phone => 0606060606 , 
        email => a@yahoo.fr , 
        adresse => [ 
            75 rue de Paris , 
            75000, 
            Paris  
        ]   
    ],
    "Zorro" => [
        phone => 0606060607 , 
        email => z@yahoo.fr , 
        adresse => [ 
            80 rue de Paris , 
            75000, 
            Paris  
    ]   
 ],
]

// créer un petit site internet en 3 pages :
// page d'accueil => lister l'ensemble des membres du l'annuaire
// page Alain => afficher le profil de ALain et afficher l'ensemble de ses informations personnelles
// page Zorro => afficher le profil de Zorro et afficher l'ensemble de ses informations personnelles
// utiliser la manière de créer des sites présenté précédemment + bootstrap pour la mise en forme 
 * 
 */