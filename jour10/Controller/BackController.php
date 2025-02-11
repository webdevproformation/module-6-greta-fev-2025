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
}