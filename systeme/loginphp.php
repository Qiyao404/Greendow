<?php 
require_once('inc/session.php');

if(isset($_SESSION['auth'])){
    header("location: index.php");
    exit;
}

if(!empty($_POST)){
	if(isset($_POST['email'], $_POST['password'])
		&& !empty($_POST['email']) && !empty($_POST['password'])){
		$_SESSION['error'] = []; 

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $_SESSION['error'][] = "Ce n'est pas un e-mail";
            }

    	require_once('inc/conn_db.php');

    	$sql = "SELECT * FROM `users` WHERE `email` = :email";
    	$req = $db->prepare($sql);
    	$req->bindValue(':email', $_POST['email']);
    	$req->execute();
    	$user = $req->fetch();

    	if(!$user || !password_verify($_POST['password'], $user['password'])){
                $_SESSION["error"][] = "Utilisateur et/ou mot de passe incorrect(s)";
            }

        if($_SESSION['error'] === []){
            $_SESSION['auth'] = ['id' => $user['user_id'], 'firstname' => $user['firstname'], 'lastname' => $user['lastname'], 'email' => $user['email'], 'roles' => $user['user_type']];
        	
            header('location: index.php');
        }
   	} else{
        $_SESSION['error'] = ["Veuillez rentrer l'e-mail et le mot de passe"];
    }
}


if(!isset($_SESSION['auth'])){
    header("location: login.php");
}