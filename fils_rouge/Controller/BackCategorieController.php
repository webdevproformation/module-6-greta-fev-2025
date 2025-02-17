<?php 

declare(strict_types = 1); 

class BackCategorieController extends AbstractController{

    public function __construct()
    {
        if(!isAdmin()){
            header("Location: ". URL ."?page=erreur403");
            die(); 
        }
    }

    public function index(){
        $data = [
            "titre" => "Gestion des catégories",
            "categories" => BDD::getInstance()->query("SELECT c.id, c.nom , c.description, DATE_FORMAT(c.dt_creation, '%d/%m/%Y') AS dt_creation , COUNT(r.titre) AS count_recette
            FROM categories AS c
            LEFT JOIN recettes AS r
            ON r.categorie_id = c.id
            GROUP BY c.id
            ")
        ];

        $this->render("back/categorie_index", $data);
    }

    public function new(){

        $id = "";
        $nom = "";
        $description = "";

        $erreurs = []; 
        if(!empty($_POST)){
            $id = "";
            $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
            $description = isset($_POST["description"]) ? $_POST["description"] : "";

            if(strlen($nom) < 2 || strlen($nom)> 255){
                $erreurs[] = "le champ nom doit contenir au minimum 2 caractères et au maximum 255 caractères"; 
            }

            if(strlen($description) < 2 || strlen($description)> 10_000){
                $erreurs[] = "le champ description doit contenir au minimum 2 caractères et au maximum 10 000 caractères"; 
            }

        }

        if(count($erreurs) === 0 && !empty($_POST)){

            $id = BDD::getInstance()->query("INSERT INTO categories (nom , description ) VALUES (:nom , :description )" , [ 
                "nom" => $nom ,
                "description" => $description ,
            ]);
            header("Location: ". URL ."?page=admin/categories");
            die();
        }
        

        $data = [
            "titre" => "Créer une nouvelle catégorie",
            "data_form" => [
                "id" => $id,
                "nom" => $nom ,
                "description" => $description
            ],
            "erreurs" => $erreurs 
        ];

        $this->render("back/categorie_form", $data);
    }

    public function delete( string $id){

        $categories = BDD::getInstance()->query("SELECT * FROM categories WHERE id = :id" , [ "id" => $id ]);

        if(empty($categories)){
            $data = [
                "titre" => "impossible de supprimer la catégorie",
                "contenu" => [
                    "num" => 404,
                    "message" => "le projet que vous souhaiter supprimer n'existe pas"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }


        try{
            BDD::getInstance()->query("DELETE FROM categories WHERE id = :id" , ["id" => $id]) ;
        }catch(Exception $e){
            $data = [
                "titre" => "impossible de supprimer la catégorie",
                "contenu" => [
                    "num" => 403,
                    "message" => "la catégorie est utilisée sur une recette"
                ]
                ];
            $this->render("front/erreur" , $data);
            die();
        }

        
        
        header("Location: ". URL ."?page=admin/categories");
    }

    public function update(string $id){

        // verifier que le projet à mettre à jour existe 
        $projet = BDD::getInstance()->query("SELECT * FROM categories WHERE id = :id" , ["id" => $id]);

        // sinon 404 et stop 
        if(empty($projet)){
            $data = [
                "titre" => "impossible de mettre à jour une catégorie",
                "contenu" => [
                    "num" => 404,
                    "message" => "la catégorie que vous souhaitez mettre à jour n'existe pas"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }

        $nom = $projet[0]["nom"];
        $description = $projet[0]["description"];

        $erreurs = []; 
        if(!empty($_POST)){
            $nom = isset($_POST["nom"]) ? $_POST["nom"] : $nom;
            $description = isset($_POST["description"]) ? $_POST["description"] : $description;

            if(strlen($nom) < 2 || strlen($nom)> 255){
                $erreurs[] = "le champ nom doit contenir au minimum 2 caractères et au maximum 255 caractères"; 
            }

            if(strlen($description) < 2 || strlen($description)> 10_000){
                $erreurs[] = "le champ description doit contenir au minimum 2 caractères et au maximum 10 000 caractères"; 
            }

        }

        if(!empty($_POST) && count($erreurs) === 0){

            BDD::getInstance()->query("UPDATE categories SET nom = :nom , description = :description WHERE id = :id", [
                "id" => $id ,
                "nom" => $nom ,
                "description" => $description 
            ]);

            $_SESSION["flash"]= "le projet a bien été mis à jour";
            header("Location: ". URL . "?page=admin/categories");
            die(); 
        }
        
        $data = [
            "titre" => "Mettre à jour un projet existant",
            "data_form" => [
                "id" => $id,
                "nom" => $nom ,
                "description" => $description,
            ],
            "erreurs" => $erreurs
        ];

        $this->render("back/categorie_form", $data);
    }
}