<?php 
	session_start();

	if(!isset($_SESSION["utilisateur"])){
		header("Location: connexion.php");
		exit;
	}

	unset($_SESSION["utilisateur"]);

	header("Location: accueil.php");
