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
        $data = [
            "titre" => "Créer un nouveau projet"
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