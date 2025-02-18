- créer la base de données
- remplir chaque entité / table avec 1 ligne
    - créer 1 user
    - créer 1 catégorie
    - créer 1 commentaire
    - créer 1 recette
- router => index.php (point entrée de l'application / front controller)
    - session  (me connecter)
    - $page => quelle page je veux afficher
    - router qui contient 24 pages différentes 
    - require_once => permet de charger tous les fichiers dont on a besoin de pour exécuter le projet
    - exécution (Dispatcher) => Controller (qui se trouve dans le dossier Controller)

Remarque j'ai créer plusieurs controller pour la partie Back office 
    - BackController => page d'accueil du back office
    - BackRecetteController => gestion des recettes dans le back office
    - BackCategorieController => gestion des categories dans le back office
    - BackUserController => gestion des utilisateurs dans le back office
    - BackCommentairesController => gestion des commentaires dans le back office

    - FrontController => pages publiques

    - ErreurController => page d'erreur 404 / 401 / 403 

# FrontController

- je crée une méthode par page que je veux afficher 
    - home
    - single
    - mention_legale
    - connexion
    - inscription
    - deconnexion

# BackCategorieController /  BackUserController / BackCommentairesController / BackRecetteController 
    
    - CRUD 
    - index  => READ  
    - new    => CREATE
    - update => UPDATE
    - delete => DELETE 

Attention pour les commentaires la possibilité d'ajouter des commentaires se trouvent dans FrontController => methode single sans connexion 


#  FrontController home 

    - logique pour la pagination
    - if id n'est pas correcte => erreur 404
    - requête SQL en utilisant `BDD::getInstance()->query( $sql )`
    - envoie les informations à la vue 
    ```php    
        $data = [] ;
        $this->render("front/home", $data); 
    ```
    Dans le dossier Vue => front/home.php


```php

$id = 10 ;
if($id == 11){
    echo "bonjour";
}else {
    echo "au revoir";
}

// if ternaire 
echo ($id == 11) ? "bonjour" : "au revoir"; 
```

```php

$recettes = [
    [ "id" => 1 , "titre"  => "recette 1"],
    [ "id" => 2 , "titre"  => "recette 2"],
];

foreach ($recettes as $key => $recette){
        echo $key ; 
}
// $key correspond à la position de la recette dans le tableau indexé $recettes ; 

```

#  FrontController single 

    - afficher un article 
    - et permettre d'ajouter un commentaire  
    - 
    - 
## chartjs

- installation => CDN 
- télécharger la librairie
- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
- dire ce que je veux faire avec la librairie
- => afficher une histogramme empilé 
- <script></script>    


```php 


class Etudiant{

    public $prenom = "Alain";

    public function prenom()
    {
        echo $this->prenom ;
    }

}

$e = new Etudiant();
$e->prenom ; 


class Formation{
    public static $prix = 2_000 ;

    public function prixTTC ()
    {
        echo  self::$prix ; 
    }
}

Formation::$prix ; 


// ------ 

$connexion = new PDO("...", "root", "root");
$stmt = $connexion->prepare("SELECT * FROM users WHERE role = 'admin'")
$stmt-> execute()
$stmt->fetchAll();


$connexion = new PDO("...", "root", "root");
$stmt = $connexion->prepare("SELECT * FROM commentaires WHERE is_active = 1")
$stmt-> execute();
$stmt->fetchAll();

$connexion = new PDO("...", "root", "root");
$stmt = $connexion->prepare("SELECT * FROM commentaires WHERE is_active = 0")
$stmt-> execute()
$stmt->fetchAll();

function query($sql){
    // je ne veux pas créer autant de connexion que j'ai de requête

    $connexion = new PDO("...", "root", "root");
    $stmt = $connexion->prepare($sql) ; 
    $stmt-> execute()
    $stmt->fetchAll();
}

class Singleton{
    private static $instance = null ;

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Singleton()
        }
        return self::$instance  ; 
    }
    public private __construct(){
        $this->connexion = new PDO("");
    }
}
// permet de garantir QUE tu ne peux faire QUE une seule fois la création du Singleton !!! 

// design pattern ! => présenté par le Gang of Four (4 développeurs pro en Java )

```