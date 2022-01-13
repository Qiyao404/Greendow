<?php
	require_once("includes/session.php");
	require_once("includes/bdd.php");
	require_once("includes/sql.php");

	if(isset($_SESSION["utilisateur"])){
		header("Location: profil.php");
		exit;
	}

	if(!empty($_POST)){
		if(isset($_POST["prenom"], $_POST["nom"], $_POST["email"], $_POST["c_email"], $_POST["mdp"], $_POST["c_mdp"])
			&& !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["c_email"])
			&& !empty($_POST["mdp"]) && !empty($_POST["c_mdp"])){
			$_SESSION["erreur"] = [];

			if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				$_SESSION["erreur"][] = "Ce n'est pas un e-mail";
			}elseif($_POST["email"] !== $_POST["c_email"]){
				$_SESSION["erreur"][] = "Les e-mails sont différents";
			} else {
				$stmt = $db->prepare(selectAll("utilisateur", "email"));

				$stmt->bindValue(":donnee", $_POST["email"]);

				$stmt->execute();

				$verif = $stmt->fetch();

				if($verif){
					$_SESSION["erreur"][] = "Il existe déjà un compte associé à cet e-mail";
				}
			}

			$majuscule = preg_match("@[A-Z]@", $_POST["mdp"]);
			$miniscule = preg_match("@[a-z]@", $_POST["mdp"]);
			$chiffre = preg_match("@[0-9]@", $_POST["mdp"]);
			$caractere = preg_match("@[\W]@", $_POST["mdp"]);

			if(!$majuscule || !$miniscule || !$chiffre || !$caractere || strlen($_POST["mdp"]) < 8 || strlen($_POST["mdp"]) > 20){
				$_SESSION["erreur"][] = "Le mot de passe doit contenir entre 8 et 20 caratères avec une Majuscule, une miniscule, un chiffre et un caratère spécial : @#\-_$%^&+=§!\? etc..";
			} elseif($_POST["mdp"] !== $_POST["c_mdp"]){
				$_SESSION["erreur"][] = "Les mots de passe sont différents";
			}	
			if($_SESSION["erreur"] === []){
				$prenom = strip_tags($_POST["prenom"]);
				$nom = strip_tags($_POST["nom"]);
				$mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
			
				$stmt = $db->prepare(insertInto("inscription"));

				$stmt->bindValue(":prenom", $prenom);
				$stmt->bindValue(":nom", $nom);
				$stmt->bindValue(":email", $_POST["email"]);

				$stmt->execute();

				$id = $db->lastInsertId();

				$_SESSION["utilisateur"] = ["id" => $id, "prenom" => $prenom,
            	"nom" => $nom, "email" => $_POST["email"], "roles" => "ROLE_USER"];

            	header("Location: profil.php");
        	}
		} else{
			$_SESSION["erreur"] = ["Le formulaire est incomplet"];
		}

	}

	if(!isset($_SESSION["utilisateur"])){
		header("Location: inscription.php");
	}
