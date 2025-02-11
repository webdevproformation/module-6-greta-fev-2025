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

}