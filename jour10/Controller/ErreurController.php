<?php 

class ErreurController extends AbstractController {

    public function erreur( int $num, string $message )
    {
        $data = [
            "titre" => $message,
            "contenu" => [
                "num" => $num ,
                "message" => $message
            ]
        ];
        $this->render("erreur" , $data);
    }

    public function erreur401(){
        $this->erreur(401, "Vous devez vous connecter au préalable pour accéder à cette page"); 
    }

}