<?php
    require_once('user_connection.php');
    if(isset($_SESSION["connexion"]) && $_SESSION["connexion"] && $_SESSION["connexionData"]["profil"] == "Administrateur"){
    	require_once('entete_administateur.php');
    }else{
    	require_once('entete_visiteur.php');
    }
?>