<?php 

declare(strict_types = 1); 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour06-poo/04-exo.php

class Exo {
    public int $note = 10 ;
    public string $nom = "Alain";

    public function presentation(){
        return "{$this->nom} a eu une note de {$this->note} / 20";
    }
}

$e = new Exo();
echo $e->presentation(); 