<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06-poo/01-start.php

// en PHP
// valeur simple 1 variable contient 1 valeur

$a = 1 ; // int
$b = 2.5 ; // float

// string 
$c = "Victor Hugo" ;

// boolean
$d = TRUE ;

// valeur complexe 1 variable contient plusieurs valeurs 

// tableaux (array)
$e = [1,2,3] ; // tableau indexé
$f = [ // tableau associatif 
    "nom"  => "Zorro",
    "age"  => 22 
];

// dernier type de variable que l'on peut créé en PHP => objet 
?>
<script>
    // en JS et Python
    // lorsque vous créé une variable => objet quelquesoit son type 
    const a = "Alain" ; 

</script>
<?php 
// contrairement à ces deux langages informatiques 
// en PHP il y a une étape intermédiaire pour créer un objet => créer une class 

// class => usine qui permet de créer des objets 
class Etudiant{
    // ne pas mettre de $ devant le nom de la class
    // il est conseillé de mettre la nom de la class en Majuscule => PascalCase
}

// c'est la variable $etudiant qui est l'objet !!! 
$etudiant = new Etudiant() ; 


// je vais créer une classe Rectangle 
// qui contient 2 propriétés largeur = 30 et hauteur = 20 

class Rectangle{
    public int $largeur = 30 ;
    public int $hauteur = 20 ; 
}

$r = new Rectangle(); 

echo $r->largeur . "<br>" ; 
echo $r->hauteur . "<br>" ; 

// r.largeur 

// cas pratique : 
// créer le fichier 02-exo.php
// dans ce fichier vous allez créer une class qui s'appelle Formation
// cette class contient 4 propriétés publiques 
// nom => DWWM
// duree => 6
// unite => mois
// competences => tableau indexé 3 valeurs => PHP HTML CSS

// une fois que la class est créée créer un $f 
// afficher dans le navigateur le contenu de la propriété unite 