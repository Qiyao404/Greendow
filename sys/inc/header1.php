<div class="top-nav">
	<?php
	 	if($_SERVER["SCRIPT_NAME"] !== "/sys/index.php"){
			echo '<a href="index.php"><img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png"style="height: 100px;"></a>';
		} else{
			echo '<a href="#" style="cursor: default;";><img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png" style="height: 100px;"></a>';
		}
	?>
	<a href="#" class="top1" style="line-height: 40px;transform: translateY(15%)">Pourquoi Greendow</a>
	<a href="#">FAQ</a>
	<a href="https://infinitemeasures.fr/vues/fr/index.php">Acheter</a>
	<?php
		if(!isset($_SESSION['auth'])){
			if($_SERVER["SCRIPT_NAME"] !== "/sys/login.php"){
				echo '<a href="login.php" class="top2">Connexion</a>';
			} else{
				echo '<a href="register.php" class="top2 link">Inscription</a>';
			}
		} else{				
			if($_SERVER["SCRIPT_NAME"] === "/sys/modification.php"){
				echo "<a href='#' style='cursor: default;line-height: 40px;transform: translateY(15%);' class='top2'>".$_SESSION['auth']['firstname']." ".$_SESSION['auth']['lastname']."</a>";
			} else {
				echo "<button style='line-height: 40px;transform: translateY(15%)' class='button top2' data-modal='modalOne'>".$_SESSION['auth']['firstname']." ".$_SESSION['auth']['lastname']."</button>";
			}
			echo '<a href="logout.php" >Déconnexion</a>';
		}
	?>
	<a href="#">Support</a>
</div>

<?php if($_SERVER["SCRIPT_NAME"] !== "/sys/modification.php" && isset($_SESSION['auth'])): ?>
	<div id="modalOne" class="modal">
	    <div class="modal-content">
	        <div class="contact-form">
	          	<a class="close">&times;</a>
	          	<h2>Profil :</h2>
	          	<p>Prénom : <?= $_SESSION['auth']['firstname'] ?></p>
	          	<p>Nom : <?= $_SESSION['auth']['lastname'] ?></p>
	          	<p>E-mail : <?= $_SESSION['auth']['email'] ?></p>
	          	<form>
	            	<a href="modification.php">
	              		<bouton>Modifier le profil</bouton>
	            	</a>
	          	</form>
	        </div>
	    </div>
	</div>
<?php endif; ?>