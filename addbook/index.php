<?php
session_start();
require_once('../res/connexion.php');
require_once('../res/redirection_admin.php');
require_once('../res/start_html.php');
require_once('../res/entete.php');
require_once('../res/body_start.php');

    echo'
   <div class="col-md-9">
    <h1 class="text-center text-success"> </h1>
     <div class="card bg-secondary">
     <div class="card-body">
      <form action="save_image.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
        <label for="auteur">Auteur</label>
         <select class="form-control" id="auteur" name="auteur">';
try {
    $select = $connexion->query("SELECT * FROM auteur");
    $select->setFetchMode(PDO::FETCH_OBJ);
    while($enregistrement = $select->fetch()){

        echo '<option value="'. $enregistrement->noauteur. '">'. $enregistrement->nom.' '.$enregistrement->prenom. '</option>';

    }

    echo '
       </select>
       </div>
       <div class="form-group">
        <label for="title">Titre:</label>
        <input class="form-control bg-light" id="title" name="title" required>
       </div>
       <div class="form-group">
        <label for="isbn">ISBN13:</label>
        <input class="form-control bg-light" id="isbn" name="isbn" required>
       </div>
       <div class="form-group">
        <label for="year">Année:</label>
        <input class="form-control bg-light" id="year" name="year" required>
       </div>
       <div class="form-group">
        <label for="abstract">Résumé:</label>
        <textarea class="form-control" id="abstract" name="abstract" rows="3" required></textarea>
       </div>
       <div class="custom-file">
        <label class="custom-file-label" for="image">Importer l\'image du livre</label>
        <input type="file" class="custom-file-input" accept="image/*" id="image" name="image" required>
       </div>
       <h1></h1>
       <button type="submit" name="btnAddBook" class="btn btn-primary">Ajouter</button>
      </form>';
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
