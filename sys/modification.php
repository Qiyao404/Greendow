<?php
	require_once('inc/session.php');

	$titre = 'Modification du profil GW';

	if(!isset($_SESSION['auth'])){
    	header("location: index.php");
    	exit;
	}

	require_once('inc/head.php');
	require_once('inc/header1.php');

	if(isset($_SESSION['error'])){
		foreach($_SESSION['error'] as $message){
			echo "<p>".$message."</p>";
		}			
		unset($_SESSION["error"]);
	}
?>
<form action="modificationphp.php" class="Inscription" method="post">
	<p>Modifier son profil</p>
	<input type="password" class="entrer" placeholder="Ancien mot de passe" name="oldPassword" id="oldPassword" style="display: none;"/>
	<input type="button" class="entrer" value="<?= $_SESSION['auth']['firstname']?>" id= "firstname"/>
	<input type="text" class="entrer" placeholder="Nouveau prénom" name="newFirstname" id="newFirstname" style="display: none;" />
	<input type="button" class="entrer" value="<?= $_SESSION['auth']['lastname']?>" id= "lastname"/>
	<input type="text" class="entrer" placeholder="Nouveau nom" name="newLastname" id="newLastname" style="display: none;"/>
	<input type="button" class="entrer" value="<?= $_SESSION['auth']['email']?>" id= "email"/>
	<input type="email" class="entrer" placeholder="Nouvelle adresse e-mail" name="newEmail" id="newEmail" style="display: none;"/>
	<input type="email" class="entrer" placeholder="Confirmer nouveau e-mail" name="c_newEmail" id="c_newEmail" style="display: none;"/>
	<input type="button" class="entrer" value="Modifier le mot de passe" id= "password"/>
	<input type="password" class="entrer" placeholder="Nouveau mot de passe" name="newPassword" id="newPassword" style="display: none;"/>
	<input type="password" class="entrer" placeholder="Confirmer nouveau mdp" name="c_newPassword" id="c_newPassword" style="display: none;"/>
	<input type="submit" class="btn" value="MODIFIER"/>
	<div><a href="index.php" style="color: white; text-decoration: none;">
	Retourner sur la page d'accueil</a></div>
</form>
<?php include_once('inc/footer.php');