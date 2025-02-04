<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06-poo/05-setter-getter.php

class Peluche{
    public string $nom = "";
    public float $prix = 0 ;
    public bool $enStock = FALSE ;  
}
// les 3 propriétés sont public 
// on peut accéder aux valeurs stockées dans ces propriétés n'importe où dans notre code 
// MAIS AUSSI on peut modifier la valeur de ces propriétés n'importe où dans notre code 

$p = new Peluche();

echo "nom de la peluche = {$p->nom} <br>"; 

$p->nom = "Barbie" ; // modifier la valeur 

echo "nom de la peluche = {$p->nom} <br>"; // 


class Jouet{
    // 3 propriétés sont désormais protégées 
    // on ne peut plus y accéder depuis l'extérieur 
    private string $nom = "";
    private float $prix = 0 ;
    private bool $enStock = FALSE ;  
    // si on veut pouvoir modifier leurs valeurs et y accéder depuis l'extérieur 
    // on va devoir créer des fonctions de type getter et setter

    // getter 
    public function getNom()
    {
        return $this->nom ;
    }

    // setter
    public function setNom( string $valeur )
    {
        // effectuer des vérifications avant de donner une valeur à la propriété
        if($valeur != ""){
            $this->nom = $valeur ; 
        }
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of enStock
     */ 
    public function getEnStock()
    {
        return $this->enStock;
    }

    /**
     * Set the value of enStock
     *
     * @return  self
     */ 
    public function setEnStock($enStock)
    {
        $this->enStock = $enStock;

        return $this;
    }
}


// créer le fichier 06-exo.php
// ce fichier contient une class Guerrier
// cette contient 2 propriétés $pv (point de vie) ayant une valeur par défaut de 0 et $nom (Atilla)
// ces deux propriétés sont privées
// vous deverz créer les setter et getter pour ces deux propriétés 
// une fois la class finalisée créer un objet $g 
// augmenter la point du vie du personnage $g à la valeur 100 
// afficher le nom et le nombre de point de vie du personnage $g 