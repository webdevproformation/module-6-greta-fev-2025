# Base de données 

## MySQL 

- renommer le dossier `phpMyAdmin.....` => `pma`
- Lancer VirtualBox et vagrant
// attention l'adresse est différente les utilisateurs de vagrant 

- http://192.168.33.10/pma

- http://localhost/phpMyAdmin   (XAMPP)
- 
- 
- ## cas pratique

via phpMyAdmin

créer dans la base de données `demo` une nouvelle table qui s'appelle `articles` et qui contient les 5 colonnes suivantes 

- id INT PRIMARY KEY AUTOINCREMENT
- titre VARCHAR( 255)
- description TEXT
- dt_publication DATE
- auteur VARCHAR(255)
- 
 
vagrant ssh 
sudo su 
mysql -u root -p
root
USE demo ;

ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';
FLUSH PRIVILEGES;

----------------------------

Créer la table catégorie

qui contient 3 colonnes
id clé primaire
libelle texte avec maximum 255 lettres  VARCHAR  INSERT 1 lettres 
position chiffre entier

ajouter 2 catégories 
- libellé "Jardinage" / position 1
- libellé "Bricolage" / position 2 

ajouter une nouvelle colonne sur la table article => categorie_id lien avec la clé primaire de table catégorie  => xxxx 

  
