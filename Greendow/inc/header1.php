<div class="top-nav">
	<div class="container clearf">
		<div class="fl"><a href="index.php"><img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png"
					style="height: 80px;"></a>
		</div>
		<div class="fl">
			<a href="index.php#pourquoi" style="margin-left: 60px;">Pourquoi Greendow</a>
			<a href="Foire aux questions.html">| FAQ |</a>
			<a href="https://infinitemeasures.fr/vues/fr/index.php">Acheter</a>
		</div>
		<div class="fr">
			<?php if(!isset($_SESSION['auth'])): ?>
			<a href="connexion.php">Connexion</a>
			<?php else: ?>
			<a href="tests/debug_session.php"><?php echo $_SESSION['auth'][1]?></a>
			<a href="logout.php">| Déconnexion</a>
			<?php endif; ?>
			<a href="testlogin.php">| Support</a>
		</div>
	</div>
</div>