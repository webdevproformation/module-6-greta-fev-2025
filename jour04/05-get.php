<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour04/05-get.php

// automatique et en plus de votre code php 
// PHP va créer des variables => super globale 

/* 
$_GET   // demande au serveur 
$_POST  // => FORMULAIRE 
$_ENV   // => environnement de travail
$_SESSION // panier d'achat et authentification  

créée par PHP automatiquement
utilisable partout $_GET (dans des fichiers / fonctions / partout !!! )
et ce sont toutes des tableaux associatifs 
*/

// $_GET = [ "cle" => "valeur" ] ; 

// http://192.168.33.10/jour04/05-get.php?prenom=alain

// $_GET = [ "prenom" => "alain"  ]

// var_dump($_GET) ; 

$pages = [
    "home" => "je suis la page d'accueil",
    "contact" => "je suis la page de contact",
    "mention-legale" => "je suis la page mention légale",
    "cv" => [
        "titre" => "mes photos",
        "photos" => [
            "https://picsum.photos/200/300",
            "https://picsum.photos/200/301",
            "https://picsum.photos/200/302",
            "https://picsum.photos/200/303",
            "https://picsum.photos/200/304",
        ]
    ]
];

// http://192.168.33.10/jour04/05-get.php?page=home
// http://192.168.33.10/jour04/05-get.php?page=contact
// http://192.168.33.10/jour04/05-get.php?page=mention-legale

$page_appelee = $_GET["page"];
if($page_appelee == "cv"){
    echo "<h1>{$pages[$page_appelee]["titre"]}</h1>";
    foreach($pages[$page_appelee]["photos"] as $photo){
        echo "<img src='{$photo}' alt=''>"; 
    }
}else {

    echo $pages[$page_appelee] ; 
}
