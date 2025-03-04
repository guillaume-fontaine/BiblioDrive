# Utiliser l'image officielle de PHP avec Apache sur Alpine Linux
FROM php:8.4.5RC1-apache-bullseye

# Définir le répertoire de travail dans le conteneur
WORKDIR /var/www/html

# Copier les fichiers sources de l'application depuis le dossier bibliodrive
COPY ./bibliodrive /var/www/html

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Définir les variables d'environnement pour la base de données
ENV DB_HOST=db
ENV DB_DBNAME=bibliodrive
ENV DB_USER=bibliodrive
ENV DB_PASSWD=supermotdepasse

# Exposer le port sur lequel Apache écoute
EXPOSE 80

# Démarrer Apache en mode avant-plan
CMD ["apache2-foreground"]