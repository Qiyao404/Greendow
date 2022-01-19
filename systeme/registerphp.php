<?php
	require_once('inc/session.php');


	if(isset($_SESSION['auth'])){
		header("location: index.php");
		exit;
	}

	if(!empty($_POST)){
		$_SESSION['error'] = []; 
		require_once('inc/conn_db.php');

		if(!isset($_POST['firstname']) || empty($_POST['firstname'])){
			$_SESSION['error'][] = "Veuillez rentrer votre prénom";
		}

		if(!isset($_POST['lastname']) || empty($_POST['lastname'])){
			$_SESSION['error'][] = "Veuillez rentrer votre nom de famille";
		}

		if(!isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$_SESSION['error'][] = "Veuillez rentrer un email valide";
		} elseif($_POST['email'] !== $_POST['c_email']){
			$_SESSION['error'][] = "Les emails sont différents";
		} else{
			$sql = "SELECT * FROM `users` WHERE (`email` = :email)";
			$stmt = $db->prepare($sql);
			$stmt->bindValue(':email', $_POST['email']);
			$stmt->execute();
			$verif = $stmt->fetch();

			if($verif) {
				$_SESSION['error'][] = "Email déjà utilisé";
			}
		}

		if(!isset($_POST['password']) || empty($_POST['password'])){
			$_SESSION['error'][]= "Veuillez rentrer un mot de passe";
		} else{
			$majuscule = preg_match("@[A-Z]@", $_POST['password']);
			$miniscule = preg_match("@[a-z]@", $_POST['password']);
			$chiffre = preg_match("@[0-9]@", $_POST['password']);
			$caractere = preg_match("@[\W]@", $_POST['password']);

			if(!$majuscule || !$miniscule || !$chiffre || !$caractere || strlen($_POST['password']) < 8 || strlen($_POST['password']) > 20){
				$_SESSION['error'][] = "Le mot de passe doit contenir entre 8 et 20 caratères avec une Majuscule, une miniscule, un chiffre et un caratère spécial : @#\-_$%^&+=§!\? etc..";
			} elseif($_POST['password'] !== $_POST['c_password']){
					$_SESSION['error'][] = "Les mots de passe sont différents";
			}
		}

		if($_SESSION['error'] === []){
			$firstname = strip_tags($_POST['firstname']);
			$lastname = strip_tags($_POST['lastname']);
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$insert = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `user_type`) VALUES (:firstname, :lastname, :email, '$password', 'client')";
			$stmt = $db->prepare($insert);
			$stmt->bindValue(':firstname', $firstname);
			$stmt->bindValue(':lastname', $lastname);
			$stmt->bindValue(':email', $_POST['email']);
			$stmt->execute();

			$id = $db->lastInsertId();
			

	        $_SESSION['auth'] = ['id' => $id, 'firstname' => $firstname, 'lastname' => $lastname, "email" => $_POST['email'], "roles" => "client"];

			header('location: index.php');
		}
	}

	if(!isset($_SESSION['auth'])){
		header("location: register.php");
	}
