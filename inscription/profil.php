<?php
	require_once("includes/session.php");

	if(!isset($_SESSION["utilisateur"])){
		header("Location: connexion.php");
		exit;
	}


	$titre = "Page de profil";
	$h1 = "Profil de ".$_SESSION["utilisateur"]["prenom"];

	include_once("includes/head.php");
	include_once("includes/nav.php");
?>
<p>Prénom : <?= $_SESSION["utilisateur"]["prenom"] ?></p>
<p>Nom : <?= $_SESSION["utilisateur"]["nom"] ?></p>
<p>E-mail : <?= $_SESSION["utilisateur"]["email"] ?></p>

<?php
	include_once("includes/footer.php");