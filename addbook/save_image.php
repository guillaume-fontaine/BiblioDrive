<?php
session_start();
require_once('../res/connexion.php');
if(isset($_POST["btnAddBook"])) {
    $target_dir = "../res/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    //on initialise la variable update ok
    $uploadOk = 1;
    //on recup l'extention du fichier
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $image_name = $_POST["title"].'.'.$imageFileType;
    $image_name = strtolower($image_name);
    $image_name = str_replace(" ", "-", $image_name);
    $target_file = $target_dir.$image_name;
     
    // erreur
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $message = "Image ajoutée avec succès.";
                //INSERT INTO `livre`(`nolivre`, `noauteur`, `titre`, `isbn13`, `anneeparution`, `resume`, `dateajout`, `image`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],NOW())
                $stmt = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, resume, dateajout, image) VALUES (:noauteur,:title,:isbn13,:anneeparution,:abstract,NOW(),:targetfile)");
                $stmt->bindValue(":noauteur", $_POST["auteur"]);
                $stmt->bindValue(":title", $_POST["title"]);
                $stmt->bindValue(":isbn13", $_POST["isbn"]);
                $stmt->bindValue(":anneeparution", $_POST["year"]);
                $stmt->bindValue(":abstract", $_POST["abstract"]);
                $stmt->bindValue(":targetfile", $image_name);
                $stmt->execute();
                header("Location: http://".$_SERVER["HTTP_HOST"]."/projet/bookinfo/?infobook=".$connexion->lastInsertId());

        } else {
            $message = "Erreur inconnue! Merci de retenter l'ajout plus tard ou de contacter l'administrateur.";
            echo $message;
        }
    } 
 }else{
    header("Location: http://".$_SERVER["HTTP_HOST"]."/projet");
 }
?>