<?php 

declare(strict_types = 1); 

class BackCommentaireController extends AbstractController{

    public function __construct()
    {
        if(!isAdmin()){
            header("Location: ". URL ."?page=erreur403");
            die(); 
        }
    }

    public function index(){

        $sql = "SELECT c.id , c.email, c.message , c.is_active , DATE_FORMAT(c.dt_creation , '%d/%m/%Y') AS dt_creation , r.titre
        FROM commentaires AS c
        JOIN recettes AS r
        ON r.id = c.recette_id
        ";

        $data = [
            "titre" => "Modération des Commentaires",
            "commentaires" => BDD::getInstance()->query($sql)
        ];

        $this->render("back/commentaire_index", $data);
    }



    public function delete( string $id){

        $commentaire = BDD::getInstance()->query("SELECT * FROM commentaires WHERE id = :id" , [ "id" => $id ]);

        if(empty($commentaire)){
            $data = [
                "titre" => "impossible de supprimer le commentaire",
                "contenu" => [
                    "num" => 404,
                    "message" => "le commentaire que vous souhaitez supprimer n'existe pas"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }

        BDD::getInstance()->query("DELETE FROM commentaires WHERE id = :id" , ["id" => $id]) ;
        
        header("Location: ". URL ."?page=admin/commentaires");
    }

    public function update(string $id){

        $commentaire = BDD::getInstance()->query("SELECT * FROM commentaires WHERE id = :id" , [ "id" => $id ] , ["id" => $id]);

        if(empty($commentaire)){
            $data = [
                "titre" => "impossible de mettre à jour le projet",
                "contenu" => [
                    "num" => 404,
                    "message" => "le projet que vous souhaiter mettre à jour n'existe pas"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }

        $email = $commentaire[0]["email"];
        $message = $commentaire[0]["message"];
        $is_active=$commentaire[0]["is_active"];

        $erreurs = []; 
        if(!empty($_POST)){
            $email = isset($_POST["email"]) ? $_POST["email"] : $email;
            $message = isset($_POST["message"]) ? $_POST["message"] : $message;
            $is_active = isset($_POST["is_active"]) ? 1 : 0 ; 

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            }  

            if(strlen($message) < 2 || strlen($message)> 10_000){
                $erreurs[] = "le champ message doit contenir au minimum 2 caractères et au maximum 10 000 caractères"; 
            }

        }

        if(!empty($_POST) && count($erreurs) === 0){

            BDD::getInstance()->query("UPDATE commentaires SET email = :email , message = :message , is_active = :is_active WHERE id = :id", [
                "id" => $id ,
                "email" => $email ,
                "message" => $message ,
                "is_active" => $is_active
            ]);

            $_SESSION["flash"]= "le projet a bien été mis à jour";
            header("Location: ". URL . "?page=admin/commentaires");
            die(); 
        }
        
        $data = [
            "titre" => "Mettre à jour un commentaire existant",
            "data_form" => [
                "id" => $id,
                "email" => $email ,
                "message" => $message,
                "is_active" => $is_active ,
            ],
            "erreurs" => $erreurs
        ];

        $this->render("back/commentaire_form", $data);
    }
}