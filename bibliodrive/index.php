 <?php
session_start();
require_once('res/connexion.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
 <title>Biblio Drive</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="res/carrousel.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <script src='res/carrousel.js'></script>
</head>

<body class="bg-dark">
 <div class="container">
    <?php
    require_once('res/user_connection.php');
    if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] && $_SESSION["connexionData"]["profil"] == "Administrateur"){
 echo'  <div class="row">
   <div class="col-md-9">
    <div class="card bg-secondary">
     <div class="card-body">La bibliothèque de Moulinsart est fermé au public jusqu\'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !
     </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <div class="card bg-secondary">
        <div class="card-body">
         <div class="row">
          <div class="col-md-3">
           <a href="http://'.$_SERVER["HTTP_HOST"].'/addbook" class="text-dark">Ajouter un livre</a>
          </div>
          <div class="col-md-3">
           <a href="http://'.$_SERVER["HTTP_HOST"].'/adduser" class="text-dark">Ajouter un utilisateur</a>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <a href="http://'.$_SERVER["HTTP_HOST"].'">
      <div class="card bg-secondary">
       <div class="card-body">
        <img class="card-img-top img-fluid" src="res/moulinsart.jpg">
       </div>
      </div>
     </a>
    </div>
  </div>
';
    }else{
 echo'  <div class="row">
   <div class="col-md-9">
    <div class="card bg-secondary">
     <div class="card-body">La bibliothèque de Moulinsart est fermé au public jusqu\'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !
     </div>
     </div>
     <div class="row">
      <div class="col-md-9">
       <div class="card bg-secondary">
        <div class="card-body">
         <form action="searchbook/" class="form-row" method="get">
          <div class="col-md-11">
           <input type="text" class="form-control bg-light" id="booksearch" placeholder="Rechercher dans le catalogue (saisie du nom de l\'auteur)" name="booksearch" required>
          </div>
          <div class="col-md-1">
           <button type="submit" class="btn btn-dark mb-2">
            <i class=\'fas fa-search\'></i>
           </button>
          </div>
         </form> 
        </div>
       </div>
      </div>
      <div class="col-md-3">
       <a href="http://'.$_SERVER["HTTP_HOST"].'/shop" class="text-dark">
        <div class="card bg-secondary">
         <div class="card-body">
          <h2 class="text-center">Panier</h2>
         </div>
        </div>
       </a>
      </div>
     </div>
    </div>
    <div class="col-md-3">
     <a href="http://'.$_SERVER["HTTP_HOST"].'">
      <div class="card bg-secondary">
       <div class="card-body">
        <img class="card-img-top img-fluid" src="res/moulinsart.jpg">
       </div>
      </div>
     </a>
    </div>
  </div>
';
    }
    require_once('res/body_start.php');
echo'
   <div class="col-md-9">
    <h1 class="text-center text-success"> </h1>
    <div class="MultiCarousel" data-items="1,1,1,2" data-slide="1" id="MultiCarousel"  data-interval="1000">
     <div class="MultiCarousel-inner">';
            //require_once("count_livre.php");

$stmt = $connexion->prepare("SELECT * FROM livre WHERE 1 order by dateajout desc ");

$stmt->setFetchMode(PDO::FETCH_OBJ);

$stmt->execute();

while($enregistrement = $stmt->fetch()){
	echo'
	<a href="http://'.$_SERVER["HTTP_HOST"].'/bookinfo/?infobook='.$enregistrement->nolivre.'">
	  <div class="item">
	   <img class="img-fluid" style="width:400px" src="res/'.$enregistrement->image.'" alt="'.$enregistrement->titre.'">
    </div>
    </a>';
}

echo'
     </div>
    <a class="leftLst" role="button" data-bs-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="rightLst" role="button" data-bs-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
    
   </div>
  </div>
';
    require_once('res/body_connexion.php');
    require_once('res/body_end.php');
    ?>
 </div>
</body>

</html>