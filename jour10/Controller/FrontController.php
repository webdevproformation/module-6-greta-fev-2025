<?php 


class FrontController{

    /**
     * cette méthode est en charge de l'affichage de la page d'accueil du site
     * attention il faut mettre home en minuscule (comme mentionné dans le $routes)
     *
     */

    public function home()
    {
        $data = [
            "titre" => "page d'accueil"
        ];
       $this->render("home" , $data);
    }

    public function presentation()
    {
        $data = [
            "titre" => "présentation du projet",
            "projets" => [
                [ 
                    "nom" => "créer un site internet en PHP",
                    "duree" => 2,
                    "unite" => "mois",
                    "technos" => ["PHP" , "JS" , "HTML" ]
                ],
                [
                    "nom" => "blog sur le jardinage",
                    "duree" => 1,
                    "unite" => "mois",
                    "technos" => ["React", "Nodejs"]
                ]
            ]
        ];
        $this->render("presentation" , $data);
    }

    public function contact(){
        $this->render("contact"); 
    }

    public function connexion(){
        $this->render("connexion") ; 
    }

    /**
     * $template_name => le nom du fichier de vue à sélectionner
     * $data => tableau qui contient l'ensemble des valeurs à envoyer à la vue 
     */
    private function render( string $template_name , array $data = [] ){
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