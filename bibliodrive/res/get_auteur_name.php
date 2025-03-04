<?php
try {
    $selects = $connexion->prepare("SELECT * FROM auteur where noauteur=:auteur");
    $selects->bindValue(':auteur', $getAuteurName);
    $selects->setFetchMode(PDO::FETCH_OBJ);
    $selects->execute();
    while($enregistrements = $selects->fetch()){
    	$nomAuteur = $enregistrements->nom;
    	$prenomAuteur = $enregistrements->prenom;
    }

} catch (Exception $e) {
    echo "Une erreur est survenue lors de l'insertion.";
    die();
}
?>