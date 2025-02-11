<?php 


abstract class AbstractController{
    // class abstraite est une class qui ne peut pas être instancée
    // elle ne peut être QUE hérité 
    // si vous faîtes $a = new AbstractController();
    // PHP dit que c'est une erreur FATALE 
     /**
     * $template_name => le nom du fichier de vue à sélectionner
     * $data => tableau qui contient l'ensemble des valeurs à envoyer à la vue 
     */
    protected function render( string $template_name , array $data = [] ){
        extract($data);
 
        /**
         $data = [ 'titre' => "page d'accueil" , "description" => "texte" , 
         "vehicules" => [ ..... ]];
         extract($data);
         $titre = "page d'accueil" ; 
         $description = "texte"; 
         $vehicules = [ ..... ]; 
         */
 
 
        require_once "Vue/header.php";
        require_once "Vue/$template_name.php";
        require_once "Vue/footer.php";
     }
}