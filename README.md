# Projet CRUD en PHP avec MySQLi

Ce projet est une application CRUD (Create, Read, Update, Delete) en PHP utilisant la base de données MySQL. Il permet de gérer les utilisateurs dans une table nommée `users` avec les colonnes `id`, `nom`, et `email`.

## Configuration de la Base de Données

La base de données utilisée dans ce projet se nomme `testMysqli`. Assurez-vous de créer cette base de données et la table `users` avec la structure suivante :

```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
```

## Structure du Projet

- **index.php**: Point d'entrée de l'application. Gère les opérations en fonction des paramètres d'URL.
- **add_user.php**: Traite l'ajout d'un nouvel utilisateur à la base de données.
- **delete_user.php**: Supprime un utilisateur de la base de données.
- **update_user.php**: Gère la mise à jour des informations d'un utilisateur.
