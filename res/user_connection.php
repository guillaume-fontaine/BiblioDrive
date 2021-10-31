 <?php       

if(isset($_POST["btnDeconnexion"])){
$_SESSION["connexion"] = false;
  $connexionData = [
    "nom" => null,
    "prenom" => null,
    "mail" => null,
    "adresse" => null,
    "codepostal" => null,
    "ville" => null,
    "profil" => null
  ];
  $_SESSION["connexionData"] = $connexionData;
  $_SESSION["shop"] = array(0);
}else if(isset($_POST["btnConnexion"])){
$email =  $_POST["mail"];
$mdp = $_POST["pwd"];

$stmt = $connexion->prepare("SELECT * FROM utilisateur Where mel=:email and motdepasse=:mdp");

$stmt->bindValue(":email", $email);

$stmt->bindValue(":mdp", $mdp);

$stmt->setFetchMode(PDO::FETCH_OBJ);

$stmt->execute();

 $_SESSION["connexion"] = false;

while($enregistrement = $stmt->fetch()){

  $_SESSION["connexion"] = true;
  $connexionData = [
    "nom" => $enregistrement->nom,
    "prenom" => $enregistrement->prenom,
    "mail" => $enregistrement->mel,
    "adresse" => $enregistrement->adresse,
    "codepostal" => $enregistrement->codepostal,
    "ville" => $enregistrement->ville,
    "profil" => $enregistrement->profil
  ];
  $_SESSION["shop"] = array(0);
  $_SESSION["connexionData"] = $connexionData;
}
}


?>