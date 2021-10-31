<?php
session_start();
require_once('../res/connexion.php');
if(isset($_POST["btnAddUser"])) {
    $stmt = $connexion->prepare("INSERT INTO `utilisateur`(`mel`, `motdepasse`, `nom`, `prenom`, `adresse`, `ville`, `codepostal`, `profil`) VALUES (:mail,:password,:name,:fname,:adress,:city,:zipcode,'Client')");
    $stmt->bindValue(":mail", $_POST["mail"]);
    $stmt->bindValue(":password", $_POST["password"]);
    $stmt->bindValue(":name", $_POST["name"]);
    $stmt->bindValue(":fname", $_POST["fname"]);
    $stmt->bindValue(":adress", $_POST["adress"]);
    $stmt->bindValue(":city", $_POST["city"]);
    $stmt->bindValue(":zipcode", $_POST["zipcode"]);
    $stmt->execute();
    header("Location: http://".$_SERVER["HTTP_HOST"]."/projet/adduser/");
 }else{
    header("Location: http://".$_SERVER["HTTP_HOST"]."/projet");
 }
?>