<?php 


class FrontController extends AbstractController {

    /**
     * cette méthode est en charge de l'affichage de la page d'accueil du site
     * attention il faut mettre home en minuscule (comme mentionné dans le $routes)
     *
     */

    public function home(?string $id = "1")
    {
        // math pour gérer la pagination 
        $nb_recettes_par_page = 8 ;
        $id = $id == null ? 0 : (int)$id - 1 ; 
        // pour la requête SQL qui permet d'afficher les recettes
        // valeur de départ $start et du nombre de recette $end
        $start = $id * $nb_recettes_par_page ;
        $end = $nb_recettes_par_page ;

        $count_page = BDD::getInstance()->query("SELECT id FROM recettes AS r WHERE r.is_publie = 1");
        $max_page = ceil( count($count_page) / $nb_recettes_par_page );

        // si l'id demandé est négatif OU supérieur au maximum erreur 404
        if($id < 0  && $id !== null || $id > $max_page -1 ){
            $data = [
                "titre" => "impossible d'afficher cette page",
                "contenu" => [
                    "num" => 404,
                    "message" => "impossible d'afficher cette page"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }

        $sql = "SELECT r.id , r.titre, r.description, r.url_img , c.nom  AS categorie
            FROM recettes AS r
            JOIN categories AS c
            ON r.categorie_id = c.id
            WHERE r.is_publie = 1
            ORDER BY r.id DESC
            LIMIT $start , $end
            " ;
        
        $data = [
            "titre" => "page d'accueil",
            "recettes" => BDD::getInstance()->query( $sql ) ,
            "max_page" => $max_page
        ];
       $this->render("front/home" , $data );
    }

    public function single(string $id)
    {
        $sql = "
            SELECT r.id, r.titre, r.description, r.url_img, DATE_FORMAT(r.dt_creation , '%d/%m/%Y %H:%i:%s') AS dt_creation, r.duree, cat.nom AS categorie, u.email AS auteur
            FROM recettes AS r
            JOIN categories AS cat
            ON cat.id = r.categorie_id
            JOIN users AS u
            ON u.id = r.user_id
            WHERE r.id = :id AND r.is_publie = 1
        ";

        $recettes = BDD::getInstance()->query($sql , ["id" => $id]);

        if(count($recettes) !== 1){
            $data = [
                "titre" => "impossible d'afficher cette recette",
                "contenu" => [
                    "num" => 404,
                    "message" => "impossible d'afficher cette recette"
                ]
                ];
            $this->render("front/erreur" , $data);
            die(); 
        }

        $email = "";
        $message = "";

        $erreurs = [];
        if(!empty($_POST)){
            $email = isset($_POST["email"]) ? $_POST["email"] : $email; 
            $message = isset($_POST["message"]) ? $_POST["message"] : $message; 

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            } 

            if(strlen($message) < 2 || strlen($message)> 10_000){
                $erreurs[] = "le champ message doit contenir au minimum 2 caractères et au maximum 10 000 caractères"; 
            }

        }

        if(count($erreurs) === 0 && !empty($_POST)){
            BDD::getInstance()->query("INSERT INTO commentaires (email , message , recette_id) VALUES (:email , :message , :recette_id)" , [ 
                "email" => $email ,
                "message" => $message ,
                "recette_id" => $id
            ]);

            header("Location: " . URL . "?page=single&id=". $id . "#commentaires");
        }


        $data = [
            "titre" => $recettes[0]["titre"],
            "recette" => $recettes[0] ,
            "commentaires" => BDD::getInstance()->query("SELECT email, message , DATE_FORMAT(dt_creation , '%d/%m/%Y %H:%i:%s') AS dt_creation FROM commentaires WHERE recette_id = :id AND is_active = TRUE" , ["id" => $id]),
            "data_form" => [
                "email" => $email ,
                "message" => $message
            ],
            "erreurs" => $erreurs
        ];
       $this->render("front/single" , $data);

    }

    public function connexion(){

        $email = "";
        $password = "";

        $erreurs = [];
        if(!empty($_POST)){

            $email = isset($_POST["email"]) ? $_POST["email"] : $email; 
            $password = isset($_POST["password"]) ? $_POST["password"] : $password; 

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            }      

            if(!preg_match("#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}#", $password)){
                $erreurs[] = "le password doit contenir au minimum 8 lettres avec minuscule, majuscule et chiffre"; 
            }

            $user = BDD::getInstance()->query("SELECT * FROM users WHERE email = :email ", [ "email" => $email ]); 

            if(empty($user)){
                $erreurs[] = "aucun utilisateur n'a l'email saisit";
            }else{
                $password_hash = $user[0]["password"]; 
                if(!password_verify($_POST["password"] , $password_hash)){
                    $erreurs[] = "le mot de passe saisit n'est pas conforme" ; 
                }
            }

            if(count($erreurs) === 0){
                // session 
                $_SESSION["user"] = [
                    "email" => $user[0]["email"],
                    "role" => $user[0]["role"],
                    "id" => $user[0]["id"],
                ];
                header("Location: ". URL ."?page=admin/dashboard");
                die();
            }
        }

        
        $data = [
            "titre" => "accéder au back office du site",
            "erreurs" => $erreurs 
        ];
        $this->render("front/connexion" , $data) ; 
    }

    public function inscription(){
        $email = "";
        $password = "";
        $erreurs = [] ; 
        if(!empty($_POST)){
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            }      
            
            if(!preg_match("#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}#", $password)){
                $erreurs[] = "le password doit contenir au minimum 8 lettres avec minuscule, majuscule et chiffre"; 
            }

            $user = BDD::getInstance()->query("SELECT * FROM users WHERE email = :email" , ["email" => $email]);
            if(!empty($user)){
                $erreurs[] = "l'email soumis est déjà utilisé, veuillez en choisir un autre"; 
            }
            sleep(random_int(0,3));
        }
        $success = [];
        if(count($erreurs) === 0 && !empty($_POST)){
            BDD::getInstance()->query("INSERT INTO users (email , password) VALUES (:email , :password)" , [
                    "email" =>  $_POST["email"],
                    "password" => password_hash($_POST["password"] , PASSWORD_BCRYPT)
            ]);
            $success[] = "votre profil a bien été créé en base de données, veuillez vous connecter pour accéder à l'espace de gestion"; 

        }
        
        $data = [
            "titre" => "s'inscrire sur le site",
            "erreurs" => $erreurs ,
            "success" => $success
        ];
        $this->render("front/inscription", $data);
    }

    public function deconnexion(){
        unset($_SESSION["user"]);
        session_destroy();
        header("Location: ". URL ."?page=connexion");
    }

    public function mention_legale(){
        $data = [
            "titre" => "Mentions Légales",
        ];
        $this->render("front/mention-legale", $data);
    }


}