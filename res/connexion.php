<?php  

try {

    $dns = 'mysql:host=database;dbname=bibliodrive'; // dbname : nom de la base
    $utilisateur = 'root'; // root sur vos postes
    $motDePasse = 'example'; // pas de mot de passe sur vos postes
    $connexion = new PDO( $dns, $utilisateur, $motDePasse );
  } catch (Exception $e) {
      echo "Connexion à MySQL impossible : ", $e->getMessage();
      die();
  }
?>
