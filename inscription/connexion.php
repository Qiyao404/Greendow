<?php
	require_once("includes/session.php");
	
	if(isset($_SESSION["utilisateur"])){
		header("Location: profil.php");
		exit;
	}

	$titre = "Connexion";
	$h1 = "Connexion";

	include_once("includes/head.php");
	include_once("includes/nav.php");

	if(isset($_SESSION["erreur"])){
		foreach($_SESSION["erreur"] as $message){
			echo "<p>".$message."</p>";
		}
		
		unset($_SESSION["erreur"]);
	}

?>
<main>		
	<form action="login.php" method="post">
			<label for="email">E-mail :</label>
			<input type="email" name="email" id="email">
		</div>	
		<div>
			<label for="mdp">Mot de passe :</label>
			<input type="password" name="mdp" id="mdp">
		</div>
		<div>
			<input type="submit" value="Se connecter">
		</div>
	</form>
</main>
<?php
	include_once("includes/footer.php");

