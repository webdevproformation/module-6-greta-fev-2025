<?php 

declare(strict_types=1);

// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/15-exo.php

function aireCercle( float $rayon )
{
    $resultat = M_PI * $rayon ** 2 ;
    echo "l'aire d'un cercle de rayon $rayon a une aire de $resultat <br>" ;
}

aireCercle(44.5);
aireCercle(70.43);