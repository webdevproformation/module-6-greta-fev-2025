<?php 


class FrontController extends AbstractController {

    /**
     * cette méthode est en charge de l'affichage de la page d'accueil du site
     * attention il faut mettre home en minuscule (comme mentionné dans le $routes)
     *
     */

    public function home()
    {
        $data = [
            "titre" => "page d'accueil"
        ];
       $this->render("home" , $data);
    }

    public function presentation()
    {

        $sql = "
            SELECT p.nom , p.duree, p.unite , GROUP_CONCAT( t.nom )  AS technos
            FROM projets AS p
            JOIN projets_technos  AS pt 
            ON pt.projet_id = p.id 
            JOIN technos AS t 
            ON t.id = pt.techno_id
            GROUP BY p.nom
            ORDER BY p.id
        ";

        $data = [
            "titre" => "présentation du projet",
            "projets" => BDD::getInstance()->query($sql)
        ];
        $this->render("presentation" , $data);
    }

    public function contact(){
        $this->render("contact"); 
    }

    public function connexion(){
        $this->render("connexion") ; 
    }

    public function inscription(){

        var_dump($_POST); 
        $erreurs = [] ; 
        if(!empty($_POST)){
            // récupérer les valeurs saisies dans le formulaire via la variable $_POST
            // extract($_POST) ; 
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";

            // verifier que les valeurs saisies sont conformes !!! 
            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "l'email n'est pas conforme"; 
            }      
            
            if(!preg_match("#(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}#", $password)){
                $erreurs[] = "le password doit contenir au minimum 8 lettres avec minuscule, majuscule et chiffre"; 
            }

            // verifier que l'email est bien unique 
            // utiliser une syntaxe spéciale dans ma requête SQL 
            // :email 
            // SELECT * FROM user WHERE email = 'toto@yahoo.fr'
            // INJECTION SQL => exécuter des requêtes SQL en utilisant le formulaire 
            // pour bloquer ce type d'attaque sur notre application => :email (requête préparée)
            $user = BDD::getInstance()->query("SELECT * FROM user WHERE email = :email" , ["email" => $email]);
            if(!empty($user)){
                $erreurs[] = "l'email soumis est déjà utilisé, veuillez en choisir un autre"; 
            }
           
        }

        // var_dump($erreurs); 
        // si c'est conforme => INSERT INTO user  (attention le password DOIT être hashé)
        if(count($erreurs) === 0){
            



        }
        // message pour lui dire que l'INSERT s'est bien réalisé 
        
        $data = [
            "titre" => "s'inscrire sur le site",
            // si ce n'est pas bon => afficher sur le formulaire les erreurs 
            "erreurs" => $erreurs 
        ];
        $this->render("inscription", $data);
    }

   

}