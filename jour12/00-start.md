# jour3 du projet de site internet complet

- Aujourd'hui => faire le back office 
- première page => page d'accueil 

- ensemble du projet est disponible dans le dossier jour10
- <https://github.com/webdevproformation/module-6-greta-fev-2025/tree/main/jour10>


# rappel / présentation de ce que l'on a fait hier ??  

- Fait évoluer le projet 
- augmenter le nombre de Controller 
    - AbstractController ?? => 

index.php  => point d'entrée de notre application

```php
$routers  = [
    "/" => [ "home", "FrontController" ]
    "inscription" => ["inscription" , "FrontController"]
]
//   demande      => qu'est ce que je dois faire ???
```

```php
class FrontController extends AbstractController{

    public function inscription()
    {
        /// ici que l'on va stocker les traitements liés à cette page
        
        // formulaire à afficher 
        // si le formulaire est soumis => traitements 
        // verification 
        // si tout est conforme => demander d'ajouter les informations en base de données 
        // SQL => avec une class Model => class BDD
        // Singleton 
        // requête PREPAREE => sécurité pour éviter les INJECTION SQL 
        BDD::getInstance()->query("INSERT INTO user (email , password) VALUES (:email, :password) " , [
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_BCRYPT  )
        ]);
    }
}


public function inscription()
{
    $erreurs = [] ; 
    if(!empty($_POST)){         
    }
    
    $success = [];
    if(count($erreurs) === 0 && !empty($_POST)){
    }
    
    $data = [
        "titre" => "s'inscrire sur le site",
        // si ce n'est pas bon => afficher sur le formulaire les erreurs 
        "erreurs" => $erreurs ,
        "success" => $success
    ];
    $this->render("inscription", $data);
}
```

## restart le projet 

## note sur les serveur MAMP sur requêtes avec GROUP BY

```sql
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
```
