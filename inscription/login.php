<?php
    require_once("includes/session.php");
    require_once("includes/sql.php");

    if(isset($_SESSION["utilisateur"])){
        header("Location: profil.php");
        exit;
    }

    if(!empty($_POST)){
        if(isset($_POST["email"], $_POST["mdp"]) && !empty($_POST["email"]) && !empty($_POST["mdp"])){ 
            $_SESSION["erreur"] = []; 

            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                $_SESSION["erreur"][] = "Ce n'est pas un e-mail";
            }
            $stmt = selectAll("utilisateur", "email", $_POST["email"]);

            $utilisateur = $stmt->fetch();

            if(!$utilisateur || !password_verify($_POST["mdp"], $utilisateur["mdp"])){
                $_SESSION["erreur"][] = "L'utilisateur et/ou le mot de passe est incorrect";
            }
            
            if($_SESSION["erreur"] === []){
                $_SESSION["utilisateur"] = ["id" => $utilisateur["id_Utilisateur"], "prenom" => $utilisateur["prenom"],
                "nom" => $utilisateur["nom"], "email" => $utilisateur["email"], "roles" => $utilisateur["roles"]];

                header("Location: profil.php");
            }
        } else{
            $_SESSION["erreur"] = ["Veuillez rentrer l'e-mail et le mot de passe"];
        }
    }

    if(!isset($_SESSION["utilisateur"])){
        header("Location: connexion.php");
    }

