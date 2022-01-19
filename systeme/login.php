<?php
require_once('inc/session.php');

if(isset($_SESSION['auth'])){
	header('location: index.php');
	exit;
}

$titre = 'Connexion GW';

include_once('inc/head.php');
include_once('inc/header1.php');

if(isset($_SESSION['error'])){
	foreach($_SESSION['error'] as $message){
		echo "<p>".$message."</p>";
	}			
	unset($_SESSION["error"]);
}
?>	
<form action="loginphp.php" method="post" class="Connexion">
	<p>Connexion</p>
	<input type="email" class="entrer" id="email" placeholder="  Adresse mail" name="email"/>
	<input type="password" class="entrer" id="password" placeholder="  Mot de passe" name="password"/>
	<a href="#" id="oublie">Mot de passe oublié</a>
	<input name="login" type="submit" class="btn" value="CONNEXION"/>
	<div><a href="register.php" id="pascompte">Vous n'avez pas de compte ? Créez-en un ici </a></div>
</form>
<?php include_once('inc/footer.php');
