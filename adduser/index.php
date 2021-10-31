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
      <form action="save_user.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
        <label for="mail">Mail:</label>
        <input class="form-control bg-light" id="mail" name="mail" required>
       </div>
       <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input class="form-control bg-light" id="password" name="password" required>
       </div>
       <div class="form-group">
        <label for="name">Nom:</label>
        <input class="form-control bg-light" id="name" name="name" required>
       </div>
       <div class="form-group">
        <label for="fname">Prénom:</label>
        <input class="form-control bg-light" id="fname" name="fname" required>
       </div>
       <div class="form-group">
        <label for="adress">Adresse:</label>
        <input class="form-control bg-light" id="adress" name="adress" required>
       </div>
       <div class="form-group">
        <label for="city">Ville:</label>
        <input class="form-control bg-light" id="city" name="city" required>
       </div>
       <div class="form-group">
        <label for="zipcode">Code Postale:</label>
        <input class="form-control bg-light" id="zipcode" name="zipcode" required>
       </div>
       <h1></h1>
       <button type="submit" name="btnAddUser" class="btn btn-primary">Créer un membre</button>
      </form>
     </div>
    </div>
   </div>
';
require_once('../res/body_connexion.php');
require_once('../res/body_end.php');
require_once('../res/end_html.php')
?>
