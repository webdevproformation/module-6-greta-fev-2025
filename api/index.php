<?php 


$dsn = "mysql:host=localhost;dbname=fils_rouge;charset=utf8mb4" ;
        $login = "root";
        $password = "root";
        // role => garantir que l'on ne peut créer QU'UNE SEULE FOIS une connexion à la base de données 
        $connexion = new PDO($dsn, $login , $password);

    $sql = "SELECT * FROM commentaires WHERE id = :id";


        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            "id" => $_GET["id"]
        ]);


        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        header('Access-Control-Allow-Origin: *');

        header('Access-Control-Allow-Methods: GET, POST');
        
        header("Access-Control-Allow-Headers: X-Requested-With");
        echo json_encode($resultats);
        die();