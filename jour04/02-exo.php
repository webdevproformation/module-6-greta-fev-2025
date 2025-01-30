<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour04/02-exo.php


$parametres = [
    "https://google.fr", 
    2, 
    20 > 12,
    ""
];

// solution 1

foreach($parametres as $valeur){
    echo gettype($valeur) . "<br>";
    if (gettype($valeur) == "integer"){
        echo "je suis un nombre entité <br>";
    }else if(gettype($valeur) == "string"){
        echo "je suis une chaine de caractère <br>";
    }else{
        echo "je suis un type non traité <br>";
    }
}