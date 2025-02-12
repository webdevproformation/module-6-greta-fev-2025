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

        //var_dump($_POST); 
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

            if((int)$duree < 1 || (int)$duree > 100 ){
                $erreurs[] = "la durée doit être un chiffre entre 2 et 99";
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
            // pause rdv à 15h55 @ toute suite !!!!!!!!!!!! 
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

    public function projet_delete( string $id){

        // verifier qu'il y a bien un projet avec l'id concerné 
        $projet = BDD::getInstance()->query("SELECT * FROM projets WHERE id = :id" , [ "id" => $id ]);

        // si c'est faux => 404 
        if(empty($projet)){
            $data = [
                "titre" => "impossible de supprimer le projet",
                "contenu" => [
                    "num" => 404,
                    "message" => "le projet que vous souhaiter supprimer n'existe pas"
                ]
                ];
            $this->render("erreur" , $data);
            die(); 
        }
        // si c'est vrai alors
        
        // supprimer les technos associées dans la table projets_technos 
        // d'abord !! lié aux relations entre les tables en base de données 
        BDD::getInstance()->query("DELETE FROM projets_technos WHERE projet_id = :projet_id" , ["projet_id" => $id]) ;
        
        // supprimer la ligne dans la table projets 
        BDD::getInstance()->query("DELETE FROM projets WHERE id = :id" , ["id" => $id]);

        header("Location: http://192.168.33.10/jour10/index.php?page=admin/projet");

    }

    public function projet_update(string $id){

        $sql = "SELECT p.nom, p.duree, p.unite , GROUP_CONCAT( pt.techno_id ) AS technos
        FROM projets AS p 
        JOIN projets_technos AS pt
        ON pt.projet_id = p.id
        WHERE id = :id
        GROUP BY p.id
        ";

        // verifier que le projet à mettre à jour existe 
        $projet = BDD::getInstance()->query($sql , ["id" => $id]);

        // sinon 404 et stop 
        if(empty($projet)){
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

        $nom = $projet[0]["nom"];
        $duree = $projet[0]["duree"];
        $unite =  $projet[0]["unite"];
        $technos = explode("," , $projet[0]["technos"]);

        // si on le soumet 
        // verifier que tout est conforme

        $erreurs = []; 
        if(!empty($_POST)){
            $nom = isset($_POST["nom"]) ? $_POST["nom"] : $nom;
            $duree = isset($_POST["duree"]) ? $_POST["duree"] : $duree;
            $unite = isset($_POST["unite"]) ? $_POST["unite"] : $unite;
            $technos = isset($_POST["technos"]) ? $_POST["technos"] : $technos;

            // verifier que toutes les valeurs soumises sont correctements remplies
            if(strlen($nom) < 2 || strlen($nom)> 255){
                $erreurs[] = "le champ nom doit contenir au minimum 2 caractères et au maximum 255 caractères"; 
            }

            if((int)$duree < 1 || (int)$duree > 100 ){
                $erreurs[] = "la durée doit être un chiffre entre 2 et 99";
            }

            $unites = ["jour", "semaine", "mois" , "année"];
            if(!in_array($unite, $unites)){
                $erreurs[] = "veuillez sélectionner une valeur dans le menu déroulant" ; 
            }

            if(empty($technos)){
                $erreurs[] = "vous devez sélectionner au moins une techno pour votre projet"; 
            }

        }

        if(!empty($_POST) && count($erreurs) === 0){

            BDD::getInstance()->query("UPDATE projets SET nom = :nom , duree = :duree , unite = :unite WHERE id = :id", [
                "id" => $id ,
                "nom" => $nom ,
                "duree" => $duree ,
                "unite" => $unite
            ]);

            BDD::getInstance()->query("DELETE FROM projets_technos WHERE projet_id = :projet_id" , ["projet_id" => $id]) ;

            foreach($technos as $techno_id){
                BDD::getInstance()->query("INSERT INTO projets_technos (projet_id , techno_id) VALUES ( :projet_id , :techno_id )", [
                    "projet_id" => $id ,
                    "techno_id" => $techno_id
                ]);
            }

            header("Location: http://192.168.33.10/jour10/index.php?page=admin/projet");
            die(); 
        }
        

        // si c'est conforme => UPDATE dans la base de données sur les deux tables
        // projets et projets_technos 


        // afficher le formulaire REMPLI 
        $data = [
            "titre" => "Mettre à jour un projet existant",
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