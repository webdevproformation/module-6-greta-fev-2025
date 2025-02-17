<?php 

declare(strict_types = 1); 

function flash(){
    if(isset($_SESSION['flash'])) {
        $message = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $message ; 
    }
}

function more(string $text , $nb_words = 20){
    $words = explode(" ", $text);
    if(count($words) <= $nb_words){
        return $text ;
    }
    $result = array_slice($words, 0, $nb_words);
    return implode( " " , $result) . " ...";
}

function isAdmin():bool{
   return isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin" ;
}

function isRedacteur():bool{
    return isset($_SESSION["user"]) && ($_SESSION["user"]["role"] === "redacteur" || $_SESSION["user"]["role"] === "admin") ;
 }