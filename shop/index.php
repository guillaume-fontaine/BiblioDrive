<?php
session_start();
require_once('../res/connexion.php');
require_once('../res/redirection_client.php');
require_once('../res/start_html.php');
require_once('../res/entete.php');
require_once('../res/body_start.php');

    if(isset($_POST["btnEmprunt"])){
    	foreach ($_SESSION["shop"] as $value) {
    		$stmt = $connexion->prepare("INSERT INTO `emprunter`(`mel`, `nolivre`, `dateemprunt`, `dateretour`) VALUES (:mail,:nolivre,NOW(),NOW()+INTERVAL 7 DAY)");
    		$stmt->bindValue(":mail", $_SESSION["connexionData"]["mail"]);
    		$stmt->bindValue(":nolivre", $value);
    		$stmt->execute();
    	}
    	$_SESSION["shop"] = array(0);
    }
    echo'<div class="col-md-9">';
    $shop = false;
    foreach ($_SESSION["shop"] as $value) {
    	if($value !== 0 ){
    		$shop = true;
    		try {
    		 $select = $connexion->prepare("SELECT * FROM livre where nolivre = :nolivre");
    		 $select->bindValue(':nolivre', $value);
    		 $select->setFetchMode(PDO::FETCH_OBJ);
    		 $select->execute();
    		 while($enregistrement = $select->fetch()){

			echo'
  <div class="row">
   <div class="col-md-9">
    <a href="http://'.$_SERVER["HTTP_HOST"].'/BiblioDrive/bookinfo/?infobook='.$enregistrement->nolivre.'" class="text-center text-dark">
     <div class="card bg-secondary">
      <div class="card-body">
       <h4>
        '.$enregistrement->titre.'
       </h4>
      </div>
     </div>
    </a>
   </div>
   <div class="col-md-3">
    <div class="card bg-secondary">
     <div class="card-body">
      <form action="http://'.$_SERVER["HTTP_HOST"].'/BiblioDrive/bookinfo/?infobook='.$enregistrement->nolivre.'" class="form-row" method="post">                         
       <button type="submit" name="btnRemoveCartRedirectShop" class="btn btn-primary">Enlever du panier</button>
      </form>
     </div>
    </div>
   </div>
  </div>';

    		}

		   } catch (Exception $e) {
    echo "Une erreur est survenue lors de l'insertion.";
    die();
		   }
    	  }
    }
	unset($value);
	if($shop){
    echo '<div class="text-dark">
     <div class="card bg-secondary">
      <div class="card-body">
      <form action="" class="form-row" method="post">                         
        <button type="submit" name="btnEmprunt" class="btn btn-primary">Emprunter</button>
        </form>
      </div>
     </div>
    </div>';
	}else{
		echo '<div class="text-dark">
     <div class="card bg-secondary">
      <div class="card-body">
     Vous n\'avez pas de livre ajouter au panier
      </div>
     </div>
    </div>';
	}
    echo'</div>';

    require_once('../res/body_connexion.php');
    require_once('../res/body_end.php');
    require_once('../res/end_html.php')
    ?>
