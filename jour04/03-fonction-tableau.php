<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour04/03-fonction-tableau.php

/**
Le CRUD :

- ajouter des valeurs dans un tableau : 
  - array_push() , 
  - array_unshift()
  - via $tab[]
  - via array_splice()
- modifier des valeurs dans un tableau 
	- via l'index
	- via array_splice()
- supprimer des éléments dans un tableau : array_splice() array_pop() array_shift() unset()
 */

$ville = ["Paris" , "Lyon"] ; 
// ajouter à la fin du tableau la valeur "Marseille"
$ville[] = "Marseille" ; 
array_push($ville , "Madrid"); 
var_dump($ville) ; 

array_unshift($ville , "Londres"); // ajouter avant Paris (en 1ère position ET ça pousse les autres valeurs d'un cran)
var_dump($ville) ; 

// ajouter Berlin entre Lyon et Marseile
// attention la fonction suivante permet d'ajouter / supprimer / modifier 
array_splice($ville, 3 , 0 , "Berlin");
// 3 position dans le tableau où je veux insérer Berlin
// 0 le nombre d'élément à supprimer ici aucun
// Berlin la valeur à insérer 
var_dump($ville); 


// Update

$societe = ["Total" , "LVMH" , "Greta" ]; 
// technique 1
$societe[0] = "Shell" ; 

var_dump($societe);
// changer LVMH en Chanel 
// technique 2
array_splice($societe , 1 , 1, "Chanel"); // le 3ème paramètre supprimer la valeur "LVMH"
var_dump($societe);


// supprimer des éléments dans un tableau : array_splice() array_pop() array_shift() unset()


$recettes = ["frites" , "pates" , "ratatouille"] ; 

unset($recettes[1]); // supprimer "pates" 
array_splice($recettes , 1 , 1) ; // équivalent à l'instruction précédente 

array_pop($recettes); // supprimer le dernier "ratatouille"
array_shift($recettes) ; // supprimer le premier "frites"

/**
1 créer un nouveau fichier 04-exo.php

2 ce fichier contient une variable de type tableau :
- le nom de la variable est $favoris
- cette variable contient les valeurs suivantes :
  - https://www.google.fr
  - https://fr.wikipedia.org
  - http://fr.yahoo.com

3 ajouter à la fin du tableau la valeur suivante : https://www.grafikart.fr/
4 ajouter au début du tableau la valeur suivante : https://www.w3schools.com/ - documentation php.net - array_unshift()
5 modifier la valeur du deuxième élément du tableau par le valeur suivante : https://developer.mozilla.org
6 supprimer le troisième élément du tableau
7 supprimer le dernier élément du tableau
8 afficher le contenu du tableau dans le navigateur

 */