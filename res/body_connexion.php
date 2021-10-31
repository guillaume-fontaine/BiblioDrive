<?php

if(isset($_POST["btnConnexion"]) && !$_SESSION["connexion"]){
  echo'
   <div class="col-md-3">
    <div class="card bg-secondary">
     <div class="card-header">Page de connexion</div>
      <div class="card-body">
       <form action="" class="form-row" method="post">
        <div class="form-group">
         <label for="email">Identifiant:</label>
         <input type="email" name="mail" class="form-control bg-light" id="email">
        </div>
        <div class="form-group">
         <label for="pwd">Mot de passe:</label>
         <input type="password" name="pwd" class="form-control bg-light" id="pwd">
        </div>                            
        <button type="submit" name="btnConnexion" class="btn btn-primary">Connexion</button>
       </form> 
      </div>
     <div class="card-footer text-danger">
      Identifiant ou mot de passe incorrect
     </div>
    </div>
   </div>
'; 
}else if(isset($_SESSION["connexion"]) && $_SESSION["connexion"]){
   echo'
   <div class="col-md-3">
    <div class="card bg-secondary">
     <div class="card-header">Page de connexion</div>
      <div class="card-body">
       <h3 class="text-center">'.$_SESSION["connexionData"]["profil"].'</h3>
       <br>
       <h4 class="text-center">'.$_SESSION["connexionData"]["prenom"]." ".$_SESSION["connexionData"]["nom"].'</h4>
       <h6 class="text-center">'.$_SESSION["connexionData"]["mail"].'</h6>
       <br>
       <h5 class="text-center">'.$_SESSION["connexionData"]["adresse"].'</h5>
       <h5 class="text-center">'.$_SESSION["connexionData"]["codepostal"].' '.$_SESSION["connexionData"]["ville"].'</h5>
       <br>
       <form action="" class="form-row" method="post">     
        <button type="submit" name="btnDeconnexion" class="btn btn-primary">Déconnexion</button>
       </form> 
      </div>
     <div class="card-footer"></div>
    </div>
   </div>
';
}else{
   echo'
   <div class="col-md-3">
    <div class="card bg-secondary">
     <div class="card-header">Page de connexion</div>
      <div class="card-body">
       <form action="" class="form-row" method="post">
        <div class="form-group">
         <label for="email">Identifiant:</label>
         <input type="email" name="mail" class="form-control bg-light" id="email">
        </div>
        <div class="form-group">
         <label for="pwd">Mot de passe:</label>
         <input type="password" name="pwd" class="form-control bg-light" id="pwd">
        </div>                            
        <button type="submit" name="btnConnexion" class="btn btn-primary">Connexion</button>
       </form> 
      </div>
     <div class="card-footer"></div>
    </div>
   </div>
';
}


?>