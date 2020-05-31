<?php
    include "_dbconnect.php";

    if (!empty($_POST["login"]) && isset($_POST["login"])) {
        
        $notempty = !empty($_POST["username"]) AND !empty($_POST["password"]);
        $isset = isset($_POST["username"]) AND isset($_POST["password"]);

        if ($notempty && $isset) {

            $nom = htmlspecialchars(trim($_POST["username"]));
            $pwd = $_POST["password"];

            try {
                $req = $conn->prepare("SELECT UserName, UserPass
                FROM USER 
                WHERE UserName = ? AND UserPass = ?");
                $req->execute(array($nom, $pwd));
                $verif = $req->rowCount();
            } catch (Exception $e) {
                die("Erreur : ".$e->getMessage());
            }
            if ($verif == 1) {
                $verifier = $conn->prepare("SELECT * FROM USER 
                WHERE UserName = ? AND UserPass = ?");

                $verifier->execute(array($nom, $pwd));

                session_start();

                $_SESSION["UserName"] = $nom;

                if (!isset($_SESSION["UserName"])) {
                    header("Location:../index.php");
                }

                header("Location:dashboard.php?");
            } else {
                echo "<h3 style='background-color:red;color:white; text-align:center'>Misy diso ny ararana na ny teny miafina! Hamarino azafady!</h3>";
            }
            
        } else {
            echo "<h3 style='background-color:red;color:white; text-align:center'>Ampidiro ny anarana sy ny teny miafinao azafady!</h3>";
        }
        
    }
?>