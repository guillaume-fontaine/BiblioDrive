<?php
session_start();
require_once('../res/connexion.php');
if(isset($_POST["btnRemoveCartRedirectShop"]) && in_array($_GET["infobook"], $_SESSION["shop"])){
    unset($_SESSION["shop"][array_search($_GET["infobook"], $_SESSION["shop"])]);
    header("Location: https://".$_SERVER["HTTP_HOST"]."/shop");
}
require_once('../res/start_html.php');
require_once('../res/entete.php');
require_once('../res/body_start.php');
   
$nolivre = $_GET["infobook"];
if(isset($_POST["btnAddCart"]) && !in_array($nolivre, $_SESSION["shop"])){
  array_push($_SESSION["shop"], $nolivre);
}else if(isset($_POST["btnRemoveCart"]) && in_array($nolivre, $_SESSION["shop"])){
  unset($_SESSION["shop"][array_search($nolivre, $_SESSION["shop"])]);
}
echo'
   <div class="col-md-9">
   <div class="card bg-secondary">
     <div class="card-body">
      <div class="row">
      ';

try {
    $select = $connexion->prepare("SELECT * FROM livre where nolivre=:livre");
    $select->bindValue(':livre', $nolivre);
    $select->setFetchMode(PDO::FETCH_OBJ);
    $select->execute();
    while($enregistrement = $select->fetch()){
      $getAuteurName = $enregistrement->noauteur;
      require_once("../res/get_auteur_name.php");
      echo'
      <div class="col-md-9">
        <h5 class="text-dark">Auteur : '.$nomAuteur.' '.$prenomAuteur.'</h5><br>
        <h6 class="text-dark">ISBN13 : '.$enregistrement->isbn13.'</h6><br>
        <h5 class="text-danger">Résumé du livre :</h5><br>
        <div class="text-white-50">'.$enregistrement->resume.'</div>
       </div>
       <div class="col-md-3">
        <img class="img-fluid" src="../res/'.$enregistrement->image.'" alt="Couverture de '.$enregistrement->titre.'">
       </div>
      </div>';
    }
    $select = $connexion->prepare("SELECT COUNT(*) as emprunt FROM `emprunter` WHERE `nolivre`=:livre");
    $select->bindValue(':livre', $nolivre);
    $select->setFetchMode(PDO::FETCH_OBJ);
    $select->execute();
    while($enregistrement = $select->fetch()){
      echo '</div>
      <div class="card-footer">
      <div class="row">
       <div class="col-md-3">';
      if($enregistrement->emprunt > 0){
        echo '<h3 class="text-danger">Indisponible</h3> ';
      }else{
        echo '<h3 class="text-success">Disponible</h3>';
      }
      echo '</div>
       <div class="col-md-9">';
      if(!isset($_SESSION["connexion"])|| !$_SESSION["connexion"]){
        echo '<h3 class="text-primary">Vous devez vous connectez pour emprunter un livre</h3>';
      }else if($_SESSION["connexionData"]["profil"] == 'Administrateur'){
        echo '<h3 class="text-primary">Vous devez vous connectez en tant que client pour emprunter un livre</h3>';
      }else if(in_array($nolivre, $_SESSION["shop"])){
        echo '<form action="" class="form-row" method="post">                         
        <button type="submit" name="btnRemoveCart" class="btn btn-primary">Enlever du panier</button>
        <h3 class="text-primary">  Actuellement dans votre panier</h3>
        </form>';
      }else if($enregistrement->emprunt == 0){
        echo '
        <form action="" class="form-row" method="post">                         
        <button type="submit" name="btnAddCart" class="btn btn-primary">Ajouter au panier</button>
        </form>';
      }else {
        echo '';
      }
      echo '</div>
      </div>';
    }
} catch (Exception $e) {
    die();
}
echo'
     </div>
    </div>
   </div>
';

    require_once('../res/body_connexion.php');
    require_once('../res/body_end.php');
    require_once('../res/end_html.php')
    ?>