
# Bibliodrive Project

Ce projet utilise Docker pour créer un environnement isolé pour une application PHP avec une base de données MySQL et un reverse proxy Caddy.

## Prérequis

- Docker
- Docker Compose

## Structure du Projet

- `Dockerfile.app` : Dockerfile pour l'application PHP.
- `Dockerfile.db` : Dockerfile pour la base de données MySQL.
- `docker-compose.yml` : Fichier de configuration Docker Compose.
- `.env` : Fichier contenant les variables d'environnement sensibles.
- `bibliodrive/` : Répertoire contenant les sources de l'application PHP.
- `your_sql_file.sql` : Fichier SQL pour initialiser la base de données.
- `Caddyfile` : Fichier de configuration pour Caddy.

## Configuration

1. **Variables d'environnement** :
   - Créez un fichier `.env` à la racine du projet avec les variables suivantes :

     ```
     DB_HOST=db
     DB_DBNAME=your_database_name
     DB_USER=your_database_user
     DB_PASSWD=your_database_password

     MYSQL_ROOT_PASSWORD=root_password
     MYSQL_DATABASE=your_database_name
     MYSQL_USER=your_database_user
     MYSQL_PASSWORD=your_database_password
     ```

   - Remplacez les valeurs par défaut par celles qui correspondent à votre configuration.

2. **Fichier `hosts`** :
   - Ajoutez une entrée dans votre fichier `hosts` pour résoudre `bibliodrive.localhost` :

     ```
     127.0.0.1   bibliodrive.localhost
     ```

   - **Sur Windows** : Le fichier `hosts` se trouve généralement à l'emplacement `C:\Windows\System32\drivers\etc\hosts`.
   - **Sur macOS/Linux** : Le fichier `hosts` se trouve généralement à l'emplacement `/etc/hosts`.

## Utilisation

1. **Construire et démarrer les conteneurs** :

   ```bash
   docker-compose up --build
   ```

Cela construira les images Docker et démarrera les conteneurs pour l'application, la base de données et Caddy.

2. **Accéder à l'application** :

   L'application sera accessible via `http://bibliodrive.localhost`.

3. **Arrêter les conteneurs** :

   ```bash
   docker-compose down
   ```

## Dockerfiles

- **Dockerfile.app** : Configure un environnement PHP avec Apache et Alpine Linux.
- **Dockerfile.db** : Configure une base de données MySQL et exécute un script SQL pour l'initialisation.

## Remarques

- Les données de la base de données ne sont pas persistées entre les redémarrages du conteneur. Pour persister les données, vous pouvez ajouter un volume dans le fichier `docker-compose.yml`.