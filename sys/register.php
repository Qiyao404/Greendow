<?php
	require_once('inc/session.php');

	if(isset($_SESSION['auth'])){
		header("location: index.php");
		exit;
	}

	$titre = 'Inscription GW';
	
	include_once('inc/head.php');
	include_once('inc/header1.php');

	if(isset($_SESSION['error'])){
		foreach($_SESSION['error'] as $message){
			echo "<p>".$message."</p>";
		}			
		unset($_SESSION["error"]);
	}
?>
<form action="registerphp.php" class="Inscription" method="post">
	<p>Inscription</p>
	<input type="text" class="entrer" placeholder="Prénom" name="firstname"/>
	<input type="text" class="entrer" placeholder="Nom" name="lastname"/>
	<input type="email" class="entrer" placeholder="Adresse e-mail" name="email"/>
	<input type="email" class="entrer" placeholder="Confirmez adresse e-mail" name="c_email"/>
	<input type="password" class="entrer" placeholder="Mot de passe" name="password"/>
	<input type="password" class="entrer" placeholder="Confirmez mot de passe" name="c_password"/>
	<input type="submit" class="btn" value="INSCRIPTION" />
	<div><a href="login.php" style="color: white;text-decoration: none;">
		Vous avez déjà un compte ? Connectez-vous ici</a></div>
</form>
<?php include('inc/footer.php');
