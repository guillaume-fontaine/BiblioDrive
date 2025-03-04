
<?php  

try {

    $db_host = getenv('DB_HOST');
    $db_dbname = getenv('DB_DBNAME');
    $dns = 'mysql:host='.$db_host.';dbname='.$db_dbname;
    $utilisateur = getenv('DB_USER');
    $motDePasse = getenv('DB_PASSWD');
    $connexion = new PDO( $dns, $utilisateur, $motDePasse );
  } catch (Exception $e) {
      echo "Connexion à MySQL impossible : ", $e->getMessage();
      die();
  }
?>