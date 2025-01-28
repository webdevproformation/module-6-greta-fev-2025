<?php 
// ! attention à l'adresse !!! 
// http://192.168.33.10/jour02/08-exo.php
/*
4 x 2 = 8
4 x 3 = 12
4 x 4 = 16
4 x 5 = 20
4 x 6 = 24
*/

// minimum 2 
// maximum 6 inclu ou 7 non inclu
// augmentation de + 1 de l'incrément
echo "<h2>solution 1</h2>"; 
for($i = 2 ; $i < 7 ; $i++ ){
    echo "4 x $i = " . $i * 4 . "<br>"; 
}
// min 8
// maximum inclu 24 
// augmentation + 4 
echo "<h2>solution 2</h2>"; 
for($i = 8 ; $i <= 24 ; $i += 4){
    echo "4 x " . $i/4 . " = " . $i . "<br>"; 
}
