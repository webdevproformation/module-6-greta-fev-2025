<?php 

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/07-exo.php

echo "<h2>solution 1</h2>";

for($i = 0; $i < 11; $i++){
    $resultat = 1 * $i;
    echo "1 x $i = $resultat <br>";
}

// -------------

echo "<h2>solution 2</h2>";

for ($i = 0; $i < 11; $i++) {
    echo "1 x $i = $i <br>";
}

// -------------

echo "<h2>solution 3</h2>";

for($i= 0; $i <= 10; $i++){
    $a = 1*$i ;
    echo "1 x $i = $a <br>";
}

echo "<h2>solution 4</h2>";

/**
1 x 0 = 0
1 x 1 = 1
1 x 2 = 2
1 x 3 = 3
...
1 x 10 = 10
 */
// créer une variable minimum 0
// condition de sortie 10 (maximum)
// augmentation  + 1

for($i = 0  ; $i <= 10 ; $i = $i + 1 ){
    echo "1 x $i = " . $i * 1 . "<br>"; 
}

/**
 * créer le fichier 08-exo.php 

en utilisant une boucle for, afficher dans le navigateur les string suivants :
4 x 2 = 8
4 x 3 = 12
4 x 4 = 16
4 x 5 = 20
4 x 6 = 24
 * 
 */