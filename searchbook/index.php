 <?php
session_start();
require_once('../res/connexion.php');
require_once('../res/start_html.php');
require_once('../res/entete.php');
require_once('../res/body_start.php');
   
    $auteur =  $_GET["booksearch"];
echo'
   <div class="col-md-9">
   <h1 class="text-center text-success">Résultat pour '.$auteur.'</h1>';
try {
    $select = $connexion->prepare("SELECT * FROM livre where noauteur in (select noauteur from auteur where nom like :auteur)");
    $select->bindValue(':auteur', $auteur);
    $select->setFetchMode(PDO::FETCH_OBJ);
    $select->execute();
    while($enregistrement = $select->fetch()){

echo'
    <a href="http://'.$_SERVER["HTTP_HOST"].'/projet/bookinfo/?infobook='.$enregistrement->nolivre.'" class="text-center text-dark">
     <div class="card bg-secondary">
      <div class="card-body">';
        echo $enregistrement->titre."";
echo'
      </div>
     </div>
    </a>';

    }

} catch (Exception $e) {
    echo "Une erreur est survenue lors de l'insertion.";
    die();
}
echo'
   </div>
';

    require_once('../res/body_connexion.php');
    require_once('../res/body_end.php');
    require_once('../res/end_html.php')
    ?>
