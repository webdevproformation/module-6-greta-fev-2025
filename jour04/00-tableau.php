<?php 

declare(strict_types = 1); 

// mixer tableaux ET boucle 

// tableau indexé 
/**
 * @var array $fleurs 
 */

// exemple 1 boucle for 
$fleurs = [ "rose" , "tulipe", "jasmin" ] ; 

echo $fleurs[0]; // min => 0
echo $fleurs[1]; 
echo $fleurs[2]; // max => 2 inclus
                 // augmentation du chiffre de + 1

// code qui se répète => éviter 
// par contre la seule chose qui change c'est le chiffre 
// => boucle for 
for($i = 0 ;  $i <= 2 ; $i++){
    echo $fleurs[$i]; 
}

// exemple 2 boucle for 

$liste = ["a","b","c", "d", "e", "f", "g" , "h"]; 

// en PHP pour compter le nombre de valeurs dans un tableau
// count()

for($i=0 ; $i < count($liste) ; $i++){

}

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour04/00-tableau.php

// récupérer le dernier élément d'un tableau indexé
// solution 1
echo "<h2>last item</h2>";
echo $liste[7] . "<br>";
// echo $liste[-1] . "<br>"; pas possible de PHP
// solution 2 
echo $liste[ count($liste) - 1 ] ; 


// exemple 3 

$adresses = [ "80 rue de Paris" , "70 rue de Lille" , "21 rue de Marseille" ]; 

foreach($adresses as $rue){
    echo $rue . "<br>"; 
}

// pour les tableaux associatifs 

$formation = [
    "duree" => 2 ,
    "nom" => "DWWM",
    "unite" => "mois",
    "img" => "https://via.placeholder.com/400x200"
];
// les chiffres / positions ne fonctionnent PAS

// echo $formation[0] ; 

// pour les tableaux associatifs => vous ne pouvez pas utiliser la boucle for 
// vous êtes obligés d'utiliser la boucle foreach 

foreach($formation as $valeur){
    echo $valeur . "<br>";
}
foreach($formation as $cle => $valeur)
{
    echo $cle . " " . $valeur . "<br>";
}

/**
 * 1 créer le fichier 01-exo.php

2 ce fichier contient un tableau ayant les valeurs suivantes :
$listeMarque = ["Toyota", "BMW", "Skoda", "Nissan"] ;

3 afficher dans le navigateur les chaines de caractères suivantes :

voiture n° 1 a la marque Toyota
voiture n° 2 a la marque BMW
voiture n° 3 a la marque Skoda
voiture n° 4 a la marque Nissan
 */