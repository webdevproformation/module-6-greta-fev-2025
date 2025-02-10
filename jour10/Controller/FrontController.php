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

        $sql = "
            SELECT p.nom , p.duree, p.unite , GROUP_CONCAT( t.nom )  AS technos
            FROM projets AS p
            JOIN projets_technos  AS pt 
            ON pt.projet_id = p.id 
            JOIN technos AS t 
            ON t.id = pt.techno_id
            GROUP BY p.nom
            ORDER BY p.id
        ";

        $data = [
            "titre" => "présentation du projet",
            "projets" => BDD::getInstance()->query($sql)
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