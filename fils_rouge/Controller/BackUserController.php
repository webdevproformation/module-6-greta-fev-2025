<?php 

declare(strict_types = 1); 

class BackUserController extends AbstractController{

    public function __construct()
    {
        if(!isAdmin()){
            header("Location: ". URL ."?page=erreur403");
            die(); 
        }
    }

    public function index(){
        $data = [
            "titre" => "Gestion des utilisateurs",
            "users" => BDD::getInstance()->query("SELECT u.id , u.email , u.is_active , u.role , DATE_FORMAT(u.dt_creation , '%d/%m/%Y') AS dt_creation , COUNT(r.user_id) AS count_recette
            FROM users AS u
            LEFT JOIN recettes AS r 
            ON r.user_id = u.id 
            GROUP BY u.id
            ")
        ];

        $this->render("back/user_index", $data);
    }


    public function new(){

        $id = "";
        $email = "";
        $password = "";
        $role = ""; 
        $is_active = 0 ; 
        $erreurs = [];

        if(!empty($_POST)){
            $email = isset($_POST["email"]) ? $_POST["email"] : $email ;
            $password = isset($_POST["password"]) ? $_POST["password"] : $password ;
            $role = isset($_POST["role"]) ? $_POST["role"] : $role ;
            $is_active = isset($_POST["is_active"]) ? 1 : 0 ; 

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

            $roles = ["redacteur", "admin"];
            if(!in_array($role, $roles)){
                $erreurs[] = "veuillez sélectionner un role dans le menu déroulant"; 
            }

        }

        if(count($erreurs) === 0 && !empty($_POST)){

            BDD::getInstance()->query("INSERT INTO users (email , password, role , is_active) VALUES (:email , :password , :role , :is_active)", [
                "email" => $email ,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "role" => $role,
                "is_active" => $is_active
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
                "role" => $role,
                "is_active" => $is_active
            ],
            "erreurs" => $erreurs
        ];
        $this->render("back/user_form" , $data); 
    }

    public function delete(string $id){

       $user = BDD::getInstance()->query("SELECT * FROM users WHERE id = :id" , [ "id" => $id ]);

        if(empty($user)){
            $data = [
                "titre" => "impossible de supprimer le profil utilisateur",
                "contenu" => [
                    "num" => 404,
                    "message" => "le profil que vous souhaitez supprimer n'existe pas"
                ]
                ];
            $this->render("front/erreur" , $data);
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
            $this->render("front/erreur" , $data);
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
            $this->render("front/erreur" , $data);
            die(); 
        }

        try{
            BDD::getInstance()->query("DELETE FROM users WHERE id = :id" , ["id" => $id]);
        }catch(Exception $e){
            $data = [
                "titre" => "impossible de supprimer le profil",
                "contenu" => [
                    "num" => 403,
                    "message" => "le profil ne peut être supprimé car il est associé à une recette"
                ]
                ];
            $this->render("front/erreur" , $data);
            die();
        }
        
        header("Location:" . URL . "?page=admin/user");

    }


    public function update(string $id){

        $user = BDD::getInstance()->query("SELECT * FROM users WHERE id = :id" , [ "id" => $id ]);

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
        $is_active=$user[0]["is_active"];
        $erreurs = [];

        if(!empty($_POST)){
            $email = isset($_POST["email"]) ? $_POST["email"] : $email ;
            $password = isset($_POST["password"]) ? $_POST["password"] : $password ;
            $role = isset($_POST["role"]) ? $_POST["role"] : $role ;
            $is_active = isset($_POST["is_active"]) ? 1 : 0 ; 

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            }      
            
            if(strlen($password) != 0 && !preg_match("#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}#", $password)){
                $erreurs[] = "le password doit contenir au minimum 8 lettres avec minuscule, majuscule et chiffre"; 
            }

            $user = BDD::getInstance()->query("SELECT * FROM users WHERE email = :email_form AND id = :id" , [
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
                BDD::getInstance()->query("UPDATE users SET email = :email ,  role = :role , is_active = :is_active WHERE id = :id", [
                    "id" => $id, 
                    "email" => $email ,
                    "role" => $role,
                    "is_active" => $is_active
                ] );
            }else {
                BDD::getInstance()->query("UPDATE users SET email = :email ,  role = :role , password = :password , is_active = :is_active WHERE id = :id", [
                    "id" => $id, 
                    "email" => $email ,
                    "password" => password_hash($password, PASSWORD_BCRYPT),
                    "role" => $role,
                    "is_active" => $is_active
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
                "role" => $role,
                "is_active" => $is_active
            ],
            "erreurs" => $erreurs
        ];
        $this->render("back/user_form" , $data); 
    }

}