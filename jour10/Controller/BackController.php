<?php 


class BackController extends AbstractController 
{

    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            header("Location: http://192.168.33.10/jour10/index.php?page=erreur401");
            die(); 
        }
    }


    public function dashboard(){

        $data = [
            "titre" => "Bienvenue dans la back office",
            "user" => $_SESSION["user"]
        ];

        $this->render("back/dashboard", $data);
    }


    public function projet_index(){
        $data = [
            "titre" => "Gestion des projets",
            "projets" => BDD::getInstance()->query("SELECT * FROM projets")
        ];

        $this->render("back/projet_index", $data);
    }



    public function projet_new(){

        var_dump($_POST); 
        // si le formulaire est soumis 
        $id = "";
        $nom = "";
        $duree = "";
        $unite = "";
        $technos = [];

        $erreurs = []; 
        if(!empty($_POST)){
            $id = "";
            $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
            $duree = isset($_POST["duree"]) ? $_POST["duree"] : "";
            $unite = isset($_POST["unite"]) ? $_POST["unite"] : "";
            $technos = isset($_POST["technos"]) ? $_POST["technos"] : [];

            // verifier que toutes les valeurs soumises sont correctements remplies
            if(strlen($nom) < 2 || strlen($nom)> 255){
                $erreurs[] = "le champ nom doit contenir au minimum 2 caractères et au maximum 255 caractères"; 
            }

            if((int)$duree < 0 || (int)$duree > 100 ){
                $erreurs[] = "la durée doit être un chiffre entre 1 et 99";
            }

            $unites = ["jour", "semaine", "mois" , "année"];
            if(!in_array($unite, $unites)){
                $erreurs[] = "veuillez sélectionner une valeur dans le menu déroulant" ; 
            }

            if(empty($technos)){
                $erreurs[] = "vous devez sélectionner au moins une techno pour votre projet"; 
            }

        }

        if(count($erreurs) === 0 && !empty($_POST)){
            // si c'est bon => INSERT en base de données !!! 
            // INSERT DANS 2 tables : table projets ET la table projets_technos
            
            // table projets
            // et j'ai besoin de récupérer l'id du projet créé !! 
            $id = BDD::getInstance()->query("INSERT INTO projets (nom , duree , unite) VALUES (:nom , :duree , :unite)" , [ 
                "nom" => $nom ,
                "duree" => $duree ,
                "unite" => $unite
            ]);
            
            foreach($technos as $techno_id){
                BDD::getInstance()->query("INSERT INTO projets_technos (projet_id , techno_id) VALUES ( :projet_id , :techno_id )", [
                    "projet_id" => $id ,
                    "techno_id" => $techno_id
                ]);
            }

            header("Location: http://192.168.33.10/jour10/index.php?page=admin/projet");
            die(); // BRAVO !!! fin du formulaire !!! 

        }
        

        $data = [
            "titre" => "Créer un nouveau projet",
            "technos" => BDD::getInstance()->query("SELECT * FROM technos"),
            // si c'est pas bon => message d'erreur ET remettre les informations qui ont été saisies précédemment
            "data_form" => [
                "id" => $id,
                "nom" => $nom ,
                "duree" => $duree,
                "unite" => $unite ,
                "technos" => $technos
            ],
            "erreurs" => $erreurs 
        ];

        $this->render("back/projet_form", $data);
    }




    public function user_index(){
        $data = [
            "titre" => "Gestion des utilisateurs",
            "users" => BDD::getInstance()->query("SELECT id , email , role , DATE_FORMAT(dt_creation , '%d/%m/%Y') AS dt_creation FROM user")
        ];

        $this->render("back/users_index", $data);
    }
}