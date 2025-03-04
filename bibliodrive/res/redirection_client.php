<?php
    require_once('user_connection.php');
    if(!isset($_SESSION["connexion"]) || !$_SESSION["connexion"] || $_SESSION["connexionData"]["profil"] !== "Client"){
    	 header("Location: https://".$_SERVER["HTTP_HOST"]);
    }
?>