<div class="top-nav">
	<div class="container clearf">
		<div class="fl">
			<a href="index.php"><img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png" id="img"></a>
		</div>
		<div class="fl">
			<a href="#" id="pqgw">Pourquoi Greendow</a>
			<a href="#">| FAQ |</a>
			<a href="#">Acheter</a>
		</div>
		<div class="fr">
			<?php
				if(!isset($_SESSION['auth'])){
					if($_SERVER["SCRIPT_NAME"] !== "/sys/login.php"){
						echo '<a href="login.php">Connexion</a>';
					} else{
						echo '<a href="register.php">Inscription</a>';
					}
				} else{				
					if($_SERVER["SCRIPT_NAME"] === "/sys/modification.php"){
						echo "<a href='#' style='cursor: default;'>".$_SESSION['auth']['firstname']." ".$_SESSION['auth']['lastname']."</a>";
					}
					echo '<a href="logout.php">| Déconnexion</a>';
				}
			?>
			<a href="#">| Support</a>
		</div>
	</div>
</div>  



