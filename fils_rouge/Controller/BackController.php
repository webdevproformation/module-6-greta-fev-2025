<?php 


class BackController extends AbstractController 
{

    public function __construct()
    {

        if(!isRedacteur() ){
            header("Location: ". URL ."?page=erreur401");
            die(); 
        }
    }


    public function dashboard(){

        $data = [
            "titre" => "Bienvenue dans la back office",
            "user" => $_SESSION["user"],
            "kpi" => [
                "recettes-publie" => BDD::getInstance()->query("SELECT COUNT(*) AS total FROM recettes WHERE is_publie = 1"),
                "recettes-non-publie" => BDD::getInstance()->query("SELECT COUNT(*) AS total FROM recettes WHERE is_publie = 0"),
                "commentaires-actif" => BDD::getInstance()->query("SELECT COUNT(*) AS total  FROM commentaires WHERE is_active = 1"),
                "commentaires-inactif" => BDD::getInstance()->query("SELECT COUNT(*) AS total  FROM commentaires WHERE is_active = 0"),
                "users-admin" => BDD::getInstance()->query("SELECT COUNT(*) AS total  FROM users WHERE role = 'admin'"),
                "users-redacteur" => BDD::getInstance()->query("SELECT COUNT(*) AS total  FROM users WHERE role = 'redacteur'"),
                "categories" => BDD::getInstance()->query("SELECT COUNT(*) AS total  FROM categories"),
            ]
        ];

        $this->render("back/dashboard", $data);
    }
   
}