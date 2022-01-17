<?php
	require_once("includes/session.php");

	if(isset($_SESSION["utilisateur"])){
		header("Location: profil.php");
		exit;
	}

	$titre = "Inscription";
	$h1 = "Inscription";

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
	<form action="register.php" method="post">
		<div>
			<label for="prenom">Prénom :</label>
			<input type="text" name="prenom" id="prenom">
		</div>
		<div>
			<label for="nom">Nom :</label>
			<input type="text" name="nom" id="nom">
		</div>
		<div>
			<label for="email">E-mail :</label>
			<input type="email" name="email" id="email">
		</div>	
		<div>
			<label for="c_email">Confirmer l'e-mail :</label>
			<input type="email" name="c_email" id="c_email">
		</div>	
		<div>
			<label for="mdp">Mot de passe :</label>
			<input type="password" name="mdp" id="mdp">
		</div>
		<div>
			<label for="c_mdp">Confirmer le mot de passe :</label>
			<input type="password" name="c_mdp" id="c_mdp">
		</div>
		<div>
			<input type="submit" value="S'inscrire">
		</div>
	</form>
</main>
<?php
	include_once("includes/footer.php");

