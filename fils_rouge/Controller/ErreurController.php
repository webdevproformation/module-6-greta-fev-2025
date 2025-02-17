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
        $this->render("front/erreur" , $data);
    }

    public function erreur401(){
        $this->erreur(401, "Vous devez être connecté au préalable pour accéder à cette page"); 
    }

    public function erreur403(){
        $this->erreur(403, "Vous devez être admin pour accéder à cette page"); 
    }

}