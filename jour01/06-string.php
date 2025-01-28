<?php  

// ! attention à votre adresse 
// http://192.168.33.10/jour01/06-string.php

$prenom = "Alain" ; 
$nom = "Dupont" ;
$rue = "75 rue de Paris" ;
$ville = "Lyon" ; 

// créer une variable qui contient le texte suivant
// Alain habite à Lyon 
// en utilisant les variables $prenom et $ville 

$phrase = "Alain habite à Lyon"; 

// solution 1 
// étant donné que l'on a des guillemets remplacer les valeurs par des variables 
$phrase = "$prenom habite à $ville" ;

// solution 2
$phrase = $prenom . " habite à " . $ville ; 

// solution 3
$phrase = "{$prenom} habite à {$ville}" ;

// je veux écrire dans une variable le texte suivant
// les Dupont sont basés au 75 rue de Paris

$phrase2 = 'les Dupont sont basés au 75 rue de Paris'; 

$phrase2 = 'les ' . $nom . ' sont basés au ' . $rue ; 
$phrase2 = 'les $nom sont basés au $rue ' ;  // ça ne fonctionne pas
echo $phrase2 ;

$titre = "<h1 class=\"first\">bonjour</h1>";

// heredoc 
$phrase3 = <<<TOTO
<h1 class="toto" id="tata">bonjour</h1>
TOTO ; 

// créer le fichier 07-exo.php 

// afficher dans le navigateur le texte suivant
// Victor Hugo a dit "Comment allez vous ??" 