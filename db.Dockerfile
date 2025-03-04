# Utiliser l'image officielle de MySQL
FROM mysql:8.0

# Définir les variables d'environnement pour la configuration de la base de données
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=bibliodrive
ENV MYSQL_USER=bibliodrive
ENV MYSQL_PASSWORD=supermotdepasse

# Copier le fichier SQL dans le conteneur
COPY bibliodrive.sql /docker-entrypoint-initdb.d/

# Exposer le port sur lequel MySQL écoute
EXPOSE 3306

# Démarrer MySQL en mode avant-plan
CMD ["mysqld"]