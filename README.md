# README.md

## Configuration de l'application Symfony

Avant de lancer l'application Symfony, il est nécessaire de mettre en place la configuration suivante :

1. Créer un fichier `.env` à la racine du projet
2. Ajouter les variables d'environnement suivantes :

APP_ENV=dev
APP_SECRET=KEY
DATABASE_URL=postgres://user:password@host:port/database_name


> Note : Dans `DATABASE_URL`, remplacer `user`, `password`, `host`, `port` et `database_name` par les informations de connexion à votre base de données PostgreSQL.

3. Exécuter la commande `composer install` pour installer les dépendances PHP
4. Exécuter la commande `npm install` pour installer les dépendances Node.js
5. Exécuter la commande `npm run build` pour compiler les fichiers CSS et JavaScript

## Exemple de DATABASE_URL pour PostgreSQL

Si vous utilisez PostgreSQL, vous pouvez utiliser l'URL de connexion suivante comme exemple :

DATABASE_URL=postgres://username:password@localhost:5432/mydatabase


