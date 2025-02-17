<?php 

declare(strict_types = 1); 

class BackRecetteController extends AbstractController{


    public function __construct()
    {
        if(!isRedacteur()){
            header("Location: ". URL ."?page=erreur403");
            die(); 
        }
    }

    public function index(){
        $sql = "SELECT r.id , r.titre, r.description, r.duree, r.url_img, DATE_FORMAT(r.dt_creation , '%d/%m/%Y') AS dt_creation , u.email AS email , c.nom AS categorie , COUNT(com.id) AS count_commentaires , r.is_publie
            FROM recettes AS r 
            JOIN categories AS c
            ON r.categorie_id = c.id
            JOIN users AS u
            ON u.id = r.user_id
            LEFT JOIN commentaires AS com
            ON com.recette_id = r.id
            ";
        $param = [];

        if(isAdmin()){
            $sql .= "GROUP BY r.id DESC";
        }else {
            $sql .= "WHERE r.user_id = :id
            GROUP BY r.id DESC";
            $param= ["id" => $_SESSION["user"]["id"]];
        }

        $data = [
            "titre" => "Gestion des recettes",
            "recettes" => BDD::getInstance()->query($sql, $param)
        ];

        $this->render("back/recette_index", $data);
    }

    public function new(){

        $id = "";
        $titre = "";
        $description = "";
        $duree = "";
        $categorie_id = "";
        $url_img = [
            "path" =>  "https://picsum.photos/400/200",
            "erreurs" => []
        ];
        $is_publie = 0 ;

        $erreurs = []; 
        if(!empty($_POST)){
            $id = "";
            $titre = isset($_POST["titre"]) ? $_POST["titre"] : $titre;
            $description = isset($_POST["description"]) ? $_POST["description"] : $description;
            $duree = isset($_POST["duree"]) ? $_POST["duree"] : $duree;
            $categorie_id = isset($_POST["categorie_id"]) ? $_POST["categorie_id"] : $categorie_id;
            $is_publie = isset($_POST["is_publie"]) ? 1 : $is_publie;

            if(strlen($titre) < 2 || strlen($titre) > 255){
                $erreurs[] = "le champ titre doit contenir au minimum 2 caractères et au maximum 255 caractères"; 
            }

            if(strlen($description) < 2 || strlen($description)> 10_000){
                $erreurs[] = "le champ description doit contenir au minimum 2 caractères et au maximum 10 000 caractères"; 
            }

            if((int)$duree < 1 || (int)$duree > 100 ){
                $erreurs[] = "la durée doit être un chiffre entre 2 et 99";
            }

            $url_img = $this->file_upload();

            foreach($url_img["erreurs"] as $erreur){
                $erreurs[] = $erreur ;
            }

            $categories = BDD::getInstance()->query("SELECT id FROM categories");
            $cat = [];
            foreach($categories as $c){
                $cat[] = $c["id"];
            }
            if(!in_array($categorie_id , $cat)){
                $erreurs[] = "veuillez sélectionner une catégorie dans le menu déroulant" ;
            }

        }

        if(count($erreurs) === 0 && !empty($_POST)){
            $id = BDD::getInstance()->query("INSERT INTO recettes (titre , description , duree , categorie_id , user_id , url_img , is_publie) VALUES (:titre , :description , :duree , :categorie_id , :user_id , :url_img , :is_publie)" , [ 
                "titre" => $titre ,
                "description" => $description ,
                "duree" => $duree,
                "categorie_id" => $categorie_id,
                "user_id" => $_SESSION["user"]["id"],
                "url_img" => $url_img["path"],
                "is_publie" => $is_publie
            ]);

            $_SESSION["flash"] = "nouvelle recette créée";
            header("Location: " . URL . "?page=admin/recettes");
            die(); 
        }
        

        $data = [
            "titre" => "Créer une nouvelle recette",
            "categories" => BDD::getInstance()->query("SELECT * FROM categories"),
            "data_form" => [
                "id" => $id,
                "titre" => $titre ,
                "description" => $description,
                "duree" => $duree ,
                "categorie_id" => $categorie_id,
                "is_publie" => $is_publie,
                "url_img" => ""
            ],
            "erreurs" => $erreurs 
        ];

        $this->render("back/recette_form", $data);
    }

    public function delete( string $id){
        $recettes = BDD::getInstance()->query("SELECT * FROM recettes WHERE id = :id" , [ "id" => $id ]);

        if(empty($recettes)){
            $data = [
                "titre" => "impossible de supprimer la recette",
                "contenu" => [
                    "num" => 404,
                    "message" => "la recette que vous souhaitez supprimer n'existe pas"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }

        if(isRedacteur()){
            $recettes = BDD::getInstance()->query("SELECT * FROM recettes WHERE id = :id AND user_id = :user_id" , [ "id" => $id , "user_id" => $_SESSION["user"]["id"] ]);

            if(empty($recettes)){
                $data = [
                    "titre" => "vous n'avez pas les droits de supprimer cet recette",
                    "contenu" => [
                        "num" => 403,
                        "message" => "vous n'avez pas les droits de supprimer cet recette"
                    ]
                    ];
                $this->render("front/erreur" , $data);
                die(); 
            }

        }

        try{
            BDD::getInstance()->query("DELETE FROM recettes WHERE id = :id" , ["id" => $id]) ;

            $_SESSION["flash"] = "recette $id a été supprimée";
            
            header("Location: ". URL ."?page=admin/recettes");
        }catch(Exception $e){
            $data = [
                "titre" => "impossible de supprimer la recette",
                "contenu" => [
                    "num" => 403,
                    "message" => "la recette que vous souhaitez supprimer est associée à des commentaires"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }
        
    }

    public function update(string $id){

        $sql = "SELECT * FROM recettes WHERE id = :id";

        // verifier que le projet à mettre à jour existe 
        $recettes = BDD::getInstance()->query($sql , ["id" => $id]);

        // sinon 404 et stop 
        if(empty($recettes)){
            $data = [
                "titre" => "impossible de mettre à jour le projet",
                "contenu" => [
                    "num" => 404,
                    "message" => "le projet que vous souhaiter mettre à jour n'existe pas"
                ]
                ];
            $this->render("erreur" , $data);
            die(); 
        }


        $titre = $recettes[0]["titre"];
        $description = $recettes[0]["description"];
        $duree = $recettes[0]["duree"];
        $categorie_id = $recettes[0]["categorie_id"];
        $url_img = $recettes[0]["url_img"];
        $is_publie = $recettes[0]["is_publie"] ;


        $erreurs = []; 
        if(!empty($_POST)){
            $titre = isset($_POST["titre"]) ? $_POST["titre"] : $titre;
            $description = isset($_POST["description"]) ? $_POST["description"] : $description;
            $categorie_id = isset($_POST["categorie_id"]) ? $_POST["categorie_id"] : $categorie_id;
            $is_publie = isset($_POST["is_publie"]) ? 1 : $is_publie;
            $is_publie = isset($_POST["is_publie"]) ? 1 : 0;

            if(strlen($titre) < 2 || strlen($titre) > 255){
                $erreurs[] = "le champ titre doit contenir au minimum 2 caractères et au maximum 255 caractères"; 
            }

            if(strlen($description) < 2 || strlen($description)> 10_000){
                $erreurs[] = "le champ description doit contenir au minimum 2 caractères et au maximum 10 000 caractères"; 
            }

            if((int)$duree < 1 || (int)$duree > 100 ){
                $erreurs[] = "la durée doit être un chiffre entre 2 et 99";
            }

            $categories = BDD::getInstance()->query("SELECT id FROM categories");
            $cat = [];
            foreach($categories as $c){
                $cat[] = $c["id"];
            }
            if(!in_array($categorie_id , $cat)){
                $erreurs[] = "veuillez sélectionner une catégorie dans le menu déroulant" ;
            }

            if(!empty($_FILES["url_img"]["tmp_name"])){
                $url_img = $this->file_upload();

                foreach($url_img["erreurs"] as $erreur){
                    $erreurs[] = $erreur ;
                }
            }


        }

        if(!empty($_POST) && count($erreurs) === 0){

            if(!empty($_FILES["url_img"]["tmp_name"])){
                BDD::getInstance()->query("UPDATE recettes SET titre = :titre , description = :description , duree = :duree , categorie_id = :categorie_id , is_publie = :is_publie , url_img = :url_img WHERE id = :id", [
                    "id" => $id,
                    "titre" => $titre ,
                    "description" => $description,
                    "duree" => $duree ,
                    "categorie_id" => $categorie_id,
                    "is_publie" => $is_publie,
                    "url_img" => $url_img["path"],
                ]);
            }else {
                BDD::getInstance()->query("UPDATE recettes SET titre = :titre , description = :description , duree = :duree , categorie_id = :categorie_id , is_publie = :is_publie WHERE id = :id", [
                    "id" => $id,
                    "titre" => $titre ,
                    "description" => $description,
                    "duree" => $duree ,
                    "categorie_id" => $categorie_id,
                    "is_publie" => $is_publie
                ]);
            }

            $_SESSION["flash"]= "la recette $id a bien été mise à jour";
            header("Location: ". URL . "?page=admin/recettes");
            die(); 
        }
        
        $data = [
            "titre" => "Mettre à jour une recette existante",
            "categories" => BDD::getInstance()->query("SELECT * FROM categories"),
            "data_form" => [
                "id" => $id,
                "titre" => $titre ,
                "description" => $description,
                "duree" => $duree ,
                "categorie_id" => $categorie_id,
                "is_publie" => $is_publie,
                "url_img" => $url_img
            ],
            "erreurs" => $erreurs
        ];

        $this->render("back/recette_form", $data);
    }
}