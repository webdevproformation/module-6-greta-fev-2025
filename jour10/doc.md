# découvrir l'architecture MVC 

- manière d'organiser son code source pour gérer un site internet 
- M => Model => en charge de la communication / interaction avec la BDD
- V => Vue => html / css / js à donner au client
- C => les traitements à faire pour afficher / traiter correctement les demandes du client

# étape 1
- créer 3 dossiers Vue / Controller / Model
- créer un fichier index.php

# cas pratique

- ajouter une nouvelle page dans votre site internet 
- page de connexion
- elle sera accessible via l'adresse suivante
- http://xxxxxxxxxxxxxxxx/jour10/index.php?page=connexion
- cette page ne contient QUE une balise 
- `<h1>accès au back office</h1>`

# créer une base de données pour ce projet 

<http://192.168.33.10/pma>

```sql
SELECT p.nom , p.duree, p.unite , t.nom  
FROM projets AS p
JOIN projets_technos  AS pt 
ON pt.projet_id = p.id 
JOIN technos AS t 
ON t.id = pt.techno_id;
```


## jour11

- créer le controller ErreurController
- créer le controller AbstractController
- expliqué le role de abstract ??
- migrer la méthode render vers AbstractController
- changer la portée de render de private  à protected 
- faire hérité ErreurController et FrontController à la class AbstractController

- nous allons lancer le back office de notre site internet
- première étape pour créer une back office => créer une table `user`

id PK
email VARCHAR(255)
password VARCHAR(255)
role VARCHAR(255) DEFAULT redacteur
dt_creation DATETIME DEFAULT maintenant 

## cas pratique

- pour le lien "Gestion des Utilisateurs"
- créer la page qui contiendra
    - la barre latérale "Menu Dashboard"
    - la partie centrale tableau qui fait la liste des profils users en base de données
        - ce tableau contient les colonnes suivantes
            - id
            - email
            - role
            - dt_creation
            - actions

=> refaire ce que je viens de vous montrer => 11h50 => 12h00