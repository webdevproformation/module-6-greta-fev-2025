<?php 


class BackController extends AbstractController 
{

    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            header("Location: ". URL ."?page=erreur401");
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

            header("Location: " . URL . "?page=admin/projet");
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

        header("Location: ". URL ."?page=admin/projet");

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
            $_SESSION["flash"]= "le projet a bien été mis à jour";
            header("Location: ". URL . "?page=admin/projet");
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


    public function user_new(){

        $id = "";
        $email = "";
        $password = "";
        $role = ""; 
        $erreurs = [];

        if(!empty($_POST)){
            $email = isset($_POST["email"]) ? $_POST["email"] : $email ;
            $password = isset($_POST["password"]) ? $_POST["password"] : $password ;
            $role = isset($_POST["role"]) ? $_POST["role"] : $role ;

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            }      
            
            if(!preg_match("#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}#", $password)){
                $erreurs[] = "le password doit contenir au minimum 8 lettres avec minuscule, majuscule et chiffre"; 
            }

            $user = BDD::getInstance()->query("SELECT * FROM user WHERE email = :email" , ["email" => $email]);
            if(!empty($user)){
                $erreurs[] = "l'email soumis est déjà utilisé, veuillez en choisir un autre"; 
            }

            $roles = ["redacteur", "admin"];
            if(!in_array($role, $roles)){
                $erreurs[] = "veuillez sélectionner un role dans le menu déroulant"; 
            }

        }

        if(count($erreurs) === 0 && !empty($_POST)){

            BDD::getInstance()->query("INSERT INTO user (email , password, role) VALUES (:email , :password , :role)", [
                "email" => $email ,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "role" => $role
            ] );

            header("Location: " . URL . "?page=admin/user");
            die(); 
        }

        $data = [
            "titre" => "créer un nouveau profil utilisateur",
            "data_form" => [
                "id" => $id,
                "email" => $email,
                "password" => $password,
                "role" => $role
            ],
            "erreurs" => $erreurs
        ];
        $this->render("back/user_form" , $data); 
    }

    public function user_delete(string $id){

       $user = BDD::getInstance()->query("SELECT * FROM user WHERE id = :id" , [ "id" => $id ]);

        if(empty($user)){
            $data = [
                "titre" => "impossible de supprimer le profil utilisateur",
                "contenu" => [
                    "num" => 404,
                    "message" => "le profil que vous souhaitez supprimer n'existe pas"
                ]
                ];
            $this->render("erreur" , $data);
            die(); 
        }

        // impossible pour un utilisateur de supprimer son propre compte 
        if($user[0]["email"] == $_SESSION["user"]["email"]){
            $data = [
                "titre" => "impossible de s'auto supprimé",
                "contenu" => [
                    "num" => 403,
                    "message" => "vous ne pouvez pas supprimer votre propre compte"
                ]
            ];
            $this->render("erreur" , $data);
            die(); 
        }

        if($_SESSION["user"]["role"] != "admin"){
            $data = [
                "titre" => "vous n'avez pas suffisament de droit",
                "contenu" => [
                    "num" => 403,
                    "message" => "vous devez être admin pour supprimer un compte utilisateur"
                ]
            ];
            $this->render("erreur" , $data);
            die(); 
        }
        
        BDD::getInstance()->query("DELETE FROM user WHERE id = :id" , ["id" => $id]);

        header("Location:" . URL . "?page=admin/user");

    }


    public function user_update(string $id){

        $user = BDD::getInstance()->query("SELECT * FROM user WHERE id = :id" , [ "id" => $id ]);

        if(empty($user)){
            $data = [
                "titre" => "impossible de supprimer le profil utilisateur",
                "contenu" => [
                    "num" => 404,
                    "message" => "le profil que vous souhaitez supprimer n'existe pas"
                ]
                ];
            $this->render("erreur" , $data);
            die(); 
        }


        $email = $user[0]["email"];
        $password = "";
        $role = $user[0]["role"]; 
        $erreurs = [];

        if(!empty($_POST)){
            $email = isset($_POST["email"]) ? $_POST["email"] : $email ;
            $password = isset($_POST["password"]) ? $_POST["password"] : $password ;
            $role = isset($_POST["role"]) ? $_POST["role"] : $role ;

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            }      
            
            if(strlen($password) != 0 && !preg_match("#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}#", $password)){
                $erreurs[] = "le password doit contenir au minimum 8 lettres avec minuscule, majuscule et chiffre"; 
            }

            $user = BDD::getInstance()->query("SELECT * FROM user WHERE email = :email_form AND id = :id" , [
                "email_form" => $email  ,
                "id" => $id
                ]
            );

            if(count($user) !== 1 && $_SESSION["user"]["email"] !== $email ){
                $erreurs[] = "l'email soumis est déjà utilisé, veuillez en choisir un autre"; 
            }

            $roles = ["redacteur", "admin"];
            if(!in_array($role, $roles)){
                $erreurs[] = "veuillez sélectionner un role dans le menu déroulant"; 
            }
        }

        if(count($erreurs) === 0 && !empty($_POST)){

            if(strlen($password) === 0){
                BDD::getInstance()->query("UPDATE user SET email = :email ,  role = :role WHERE id = :id", [
                    "id" => $id, 
                    "email" => $email ,
                    "role" => $role
                ] );
            }else {
                BDD::getInstance()->query("UPDATE user SET email = :email ,  role = :role , password = :password WHERE id = :id", [
                    "id" => $id, 
                    "email" => $email ,
                    "password" => password_hash($password, PASSWORD_BCRYPT),
                    "role" => $role
                ] );
            }

            header("Location: " . URL . "?page=admin/user");
            die(); 
        }

        $data = [
            "titre" => "mise à jour d'un profil utilisateur",
            "data_form" => [
                "id" => $id,
                "email" => $email,
                "password" => $password,
                "role" => $role
            ],
            "erreurs" => $erreurs
        ];
        $this->render("back/user_form" , $data); 
    }
}