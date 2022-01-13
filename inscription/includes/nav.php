<nav>
	<h1><?= $h1 ?? "Accueil" ?></h1>
	<dl>
		<?php 
			if($_SERVER["SCRIPT_NAME"] !== "/inscription/accueil.php"){
				echo '<dt><a href="accueil.php">Accueil</a></dt>';
			}

			if(!isset($_SESSION["utilisateur"])){
				if($_SERVER["SCRIPT_NAME"] !== "/inscription/connexion.php"){
					echo '<dt><a href="connexion.php">Connexion</a></dt>';
				}

				if($_SERVER["SCRIPT_NAME"] !== "/inscription/inscription.php"){
					echo '<dt><a href="inscription.php">Inscription</a></dt>';
				}
			} else{
				if($_SERVER["SCRIPT_NAME"] !== "/inscription/profil.php"){
					echo '<dt><a href="profil.php">Profil</a></dt>';
				}

				echo '<dt><a href="logout.php">Déconnexion</a></dt>';
			}
		?>
	</dl>
</nav>