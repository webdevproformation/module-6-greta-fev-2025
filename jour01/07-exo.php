<?php 

// ! attention à votre adresse 
// http://192.168.33.10/jour01/07-exo.php

// Victor Hugo a dit "Comment allez vous ??" 

// solution 1 apostrophe 

echo 'Victor Hugo a dit "Comment allez vous ??"<br>';  

// solution 2 => echappement

echo "Victor Hugo a dit \"Comment allez vous ??\"<br>" ; 

// solution 3 => heredoc 
echo <<<PHRASE
Victor Hugo a dit "Comment allez vous ??"<br>
PHRASE ;

// .=