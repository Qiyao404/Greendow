<?php 
require_once('inc/session.php');

if(!isset($_SESSION['auth'])){
    header("location: login.php");
    exit;
}

if(!empty($_POST)){
    require_once('inc/conn_db.php');

    $id = $_SESSION['auth']['id'];
    $sql = "SELECT `password` FROM `users` WHERE (`user_id` = '$id')";
    $req = $db->prepare($sql);
    $req->execute();
    $pass = $req->fetch();

	if(isset($_POST['oldPassword']) && !empty($_POST['oldPassword']) && password_verify($_POST['oldPassword'], $pass['password'])){
		$_SESSION['error'] = []; 

        if(isset($_POST['newEmail']) && !empty($_POST['newEmail'])){
            if(!filter_var($_POST["newEmail"], FILTER_VALIDATE_EMAIL)){
                $_SESSION['error'][] = "Ce n'est pas un e-mail";
            } elseif($_POST['newEmail'] !== $_POST['c_newEmail'] && isset($_POST['c_newEmail']) && !empty($_POST['c_newEmail'])){
                $_SESSION['error'][] = "Les e-mails sont différents";
            } elseif(!isset($_POST['c_newEmail']) || empty($_POST['c_newEmail'])){
                $_SESSION['error'][] = "Veuillez confirmer votre nouvelle e-mail";
            } else{
                $sql = "SELECT * FROM `users` WHERE (`email` = :email)";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':email', $_POST['newEmail']);
                $stmt->execute();
                $verif = $stmt->fetch();

                if($verif) {
                    $_SESSION['error'][] = "E-mail déjà utilisé";
                }
            }

            if($_SESSION['error'] === []){
                $email = $_SESSION['auth']['email'];

                $changeEmail = "UPDATE `users` SET `email` = :email WHERE (`email` = '$email')";
                $stmt = $db->prepare($changeEmail);
                $stmt->bindValue(':email', $_POST['newEmail']);
                $stmt->execute();

                $_SESSION['auth']['email'] = $_POST['newEmail'];
            }        	
        }
 
        if(isset($_POST['newPassword']) && !empty($_POST['newPassword'])){
        	$majuscule = preg_match("@[A-Z]@", $_POST['newPassword']);
			$miniscule = preg_match("@[a-z]@", $_POST['newPassword']);
			$chiffre = preg_match("@[0-9]@", $_POST['newPassword']);
			$caractere = preg_match("@[\W]@", $_POST['newPassword']);

			if(!$majuscule || !$miniscule || !$chiffre || !$caractere || strlen($_POST['newPassword']) < 8 || strlen($_POST['newPassword']) > 20){
				$_SESSION['error'][] = "Le mot de passe doit contenir entre 8 et 20 caratères avec une Majuscule, une miniscule, un chiffre et un caratère spécial : @#\-_$%^&+=§!\? etc..";
			} elseif($_POST['newPassword'] !== $_POST['c_newPassword'] && isset($_POST['c_newPassword']) && !empty($_POST['c_newPassword'])){
					$_SESSION['error'][] = "Les mots de passe sont différents";
			} elseif(!isset($_POST['c_newPassword']) || empty($_POST['c_newPassword'])){
				$_SESSION['error'][] = "Veuillez confirmer votre nouveau mot de passe";
			}
            
            if($_SESSION['error'] === []){
            	$password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);


                $changePassword = "UPDATE `users` SET `password` = '$password' WHERE (`password` = '$pass')";
                $stmt = $db->prepare($changePassword);
                $stmt->execute();               
            }           
        }
        
        if($_SESSION['error'] === []){
            if(isset($_POST['newFirstname']) && !empty($_POST['newFirstname'])){
                $firstname = strip_tags($_POST['newFirstname']);
                $prenom = $_SESSION['auth']['firstname'];

                $changePrenom = "UPDATE `users` SET `firstname` = :firstname WHERE (`firstname` = '$prenom')";
                $stmt = $db->prepare($changePrenom);
                $stmt->bindValue(':firstname', $firstname);
                $stmt->execute();

                $_SESSION['auth']['firstname'] = $firstname;
            }

            if(isset($_POST['newLastname']) && !empty($_POST['newLastname'])){
                $lastname = strip_tags($_POST['newLastname']);
                $nom = $_SESSION['auth']['lastname'];

                $changeNom = "UPDATE `users` SET `lastname` = :lastname WHERE (`lastname` = '$nom')";
                $stmt = $db->prepare($changeNom);
                $stmt->bindValue(':lastname', $lastname);
                $stmt->execute();

                $_SESSION['auth']['lastname'] = $lastname;
            }
        }
   	} else{
        $_SESSION['error'] = ["Veuillez saisir correctement votre ancien mot de passe avant de continuer"];
    }
}

if(isset($_SESSION['auth'])){
    header("location: modification.php");
}