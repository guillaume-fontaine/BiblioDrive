"# BiblioDrive" 


Installation
------------

Prérequis
  - Avoir git

Dans un invité de commande déplacer vous dans le répertoire où vous voulez installer le projet,
puis tapez la commande suivante --> git clone https://github.com/trollgun/BiblioDrive
un dossier BiblioDrive s'installera avec le projet a l'intèrieur.



Configuration de la base de données
-----------------------------------

Dans /res/connexion.php modifier
  - l'host
  - le dbname (par defaut ne pas modifier)
  - l'utilisateur
  - le mot de passe

Installer la table
  - ajouter /bibliodrive.sql dans votre BDD
    - En important depuis phpmyadmin
    - En ligne de commande --> source bibliodrive.sql;