<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour04/01-exo.php

$listeMarque = [
        "Toyota", 
        "BMW", 
        "Skoda", 
        "Nissan"
] ;

// [voiture1]
// [voiture2]
// [voiture3]
// [voiture4]
echo "<h2>solution 1</h2>";
for($i = 0 ; $i < count($listeMarque) ; $i++ ){
    echo "voiture n° " . $i + 1 . "  a la marque {$listeMarque[$i]} <br>";
}
echo "<h2>solution 2</h2>";
foreach($listeMarque as $index => $marque){
    echo "voiture n° " . $index + 1 . " a la marque $marque <br>";
}

/**
voiture n° 1 a la marque $listeMarque[0]
voiture n° 2 a la marque $listeMarque[1]
voiture n° 3 a la marque $listeMarque[2]
voiture n° 4 a la marque $listeMarque[3]
 */

 /**
1 créer un nouveau fichier php 02-exo.php

2 ce fichier contient un tableau ayant les valeurs suivantes :
$parametres = [
      "https://google.fr", 
      2, 
      20 > 12,
      ""
];

3/ afficher, dans le navigateur, le type (via gettype() ) de chaque élément du tableau

4/ parcourir chaque élément du tableau, 
- si un élément a pour type integer alors écrire dans le navigateur : je suis un nombre entité
- si un élément a pour type string alors écrire dans le navigateur : je suis une chaine de caractères
- sinon écrire dans le navigateur : je suis un type non traité
  */