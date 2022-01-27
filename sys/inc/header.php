<div class="top-nav">
	<?php
		if($_SERVER["SCRIPT_NAME"] !== "/sys/index.php"){
			echo '<a href="index.php" style="margin-left: calc(100% / 12);background-color: white;"><img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png"style="height: 100px;"></a>';
		} else{
			echo '<img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png"style="height: 100px;">';
		}
	?>
	<a href="" class="top1" style="line-height: 40px;transform: translateY(15%)">Pourquoi Greendow</a>
	<a href="">FAQ</a>
	<a href="">Acheter</a>
	<?php
		if(!isset($_SESSION['auth'])){
			if($_SERVER["SCRIPT_NAME"] !== "/sys/login.php"){
				echo '<a href="login.php" class="top2">Connexion</a>';
			} else{
				echo '<a href="register.php" class="top2">Inscription</a>';
			}
		} else{
			echo "<a href='#' class='top2'>".$_SESSION['auth']['firstname']." ".$_SESSION['auth']['lastname']."</a>";
			echo '<a href="logout.php" class="top2">Déconnexion</a>';
		}
	?>
	<a href="">Support</a>
</div>