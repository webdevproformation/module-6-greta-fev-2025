<?php 

declare(strict_types = 1); 

// on ne peut pas créer dans un fichier PHP deux fonctions qui ont le même nom 

function calcul(){

}

function calcul(){

}

// => espace de nommage => namespace ! 

class A{ // 

}
class Etudiant { }

function test( string $a , bool $b , int $c , float $e , array $f ,  A $g , mixed $h  , Etudiant $etudiant ) :void {
    
}
// mixed => plusieurs types en même temps 
// void => rien  