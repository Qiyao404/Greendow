<?php
require_once('inc/session.php');
require_once('inc/functions.php');

// Verif champs
$errors = array();
if(!empty($_POST)) {
	require_once('inc/conn_db.php');

	if(empty($_POST['name'])) {
		$errors['name'] = "Veuillez rentrer un nom";
	}

	if(empty($_POST['email'])) {
		$errors['email'] = "Veuillez rentrer un email";
	} elseif($_POST['email'] != $_POST['c_email']) {
		$errors['email'] = "Les emails sont différents";
	} else {
		$stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->execute([$_POST['email']]);
		$verif = $stmt->fetch();
		if($verif) {
			$errors['email'] = "Email déjà utilisé";
		}
	}

	if(empty($_POST['password'])) {
		$errors['password'] = "Veuillez rentrer un mot de passe";
	} elseif($_POST['password'] != $_POST['c_password']) {
		$errors['password'] = "Les mots de passe sont différents";
	}

	if(empty($errors)) {
		$stmt = $db->prepare("INSERT INTO users (name, email, password, user_type) VALUES (:name, :email, :password, 'client');");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
			
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$stmt->execute();

		$stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->execute(['email' => $_POST['email']]);
		$auth = $stmt->fetch();
		$_SESSION['auth'] = $auth;
		
		header('location:index.php');
		die();
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
		<link rel="shortcut icon" href="img/GW.ico" />
		<style type="text/css">
			*{
				margin: 0;
				-ms-user-select: none;
			}
			body{
				background: url(img/inscription.jpg) no-repeat;
				background-size: cover;
				background-attachment: fixed;
			}
			
			.container {
				display: block;
				max-width: 1080px;
				margin: 0 auto;
			}
			.fl {
				float: left;
			}
			
			.fr {
				float: right;
			}
			
			.clearf:after,
			.clearf:before {
				content: "";
				display: block;
				clear: both;
			}
			.col-2{
				
				display: block;
				position: relative;
				min-height: 1px;
				float: left;
			}
			.col-2 {
				width: 20%;
			}

			.col-3{
				
				display: block;
				position: relative;
				min-height: 1px;
				float: left;
				width: 25%;
			}

			.col-3 {
				width: 26%;
			}

			.top-nav a {
				height: 80px;
				line-height: 80px;
				text-decoration: none;
				color: black;
				font-size: 20px;
				font-family: Century Gothic;
				font-size: 20px;
			}
			
			.top-nav a:hover {
				color: royalblue;
			}

			.top-nav{
				background-color:white;
				height : 80px;
			}

			.Inscription{
				position: absolute;
				top: 50%;
				margin-top: -250px;
				left: 50%;
				margin-left: -200px;
				background-color: rgba(0,0,0,0.3);
				width: 400px;
				height: 600px;
				border-radius: 25px;
				text-align: center;
				font-family: Century Gothic;
			}
			p{
				font-size: 42px;
				font-weight: 600;
				padding: 5px 40px;
				box-sizing: border-box;
				margin-top: 30px;
				margin-bottom: 30px;
			}
			input{
				background-color: whitesmoke;
				width: 80%;
				height: 48px;
				margin-bottom: 10px;
				border: none;
				border-bottom: 2px solid silver;
				outline: none;
				font-size: 22px;
			}
			.btn{
				background-color: seagreen;
				width: 70%;
				height: 48px;
				border-radius: 8px;
				margin-top: 40px;
				font-size: 28px;
				font-weight: 600;
				color: white;
				border-style: none;
			}
			.btn:hover{
				background-color: #008000;
			}
			.entrer:hover{
				background-color: gainsboro;
			}
			.Inscription a:hover{
				color: yellow!important;
			}
			
			.footer {
				display: flex;
				justify-content: space-around;
				height: 212px;
				width: 100%;
				background-color: rgba(34,140,34,0.8);
				position: absolute;
				margin: 700px 0 0 0;
				font-family: Century Gothic;
			}
			
			.f2 {
				color: white;
				margin-top: 10px;
				font-size: 12px;
			}
			
			.f3 div {
				font-size: 25px;
				margin-top: 25px;
				margin-left: 80px;
			
			}
			
			.footer a {
				text-decoration: none;
				color: white;
			}
			
			.f4 {
				margin: 75px auto;
				height: 50px;
				width: 100px;
				background-color: #5eaf4d;
				border-radius: 10px;
				font-size: 22px;
				text-align: center;
				line-height: 50px;
			}
			
			.footer a:hover {
				color: yellow;
			}
		</style>
	</head>
	<body>

	<?php 
			include ('inc/header1.php');
			debug($errors);
		?>
		
		<div class="top-nav">
			<div class="container clearf">
				<div class="fl"><a href="tryindex.html"><img
					src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png"
					style="height: 80px;"></a>
				</div>
				<div class="fl">
					<a href="tryindex.html#pourquoi" style="margin-left: 60px;">Pourquoi Greendow</a>
					<a href="Foire aux questions.html">| FAQ |</a>
					<a href="#">Acheter</a>
				</div>
				<div class="fr">
					<a href="Connexion.html">Connexion</a>
					<a href="#">| Support</a>
				</div>
			</div>
		</div>
		
		
		<form action="Petit quizz d'inscription.html" class="Inscription">
			<p>Inscription</p>
			<input type="text" class="entrer" placeholder="Adresse mail"/>
			<input type="text" class="entrer" placeholder="Confirmez adresse email"/>
			<input type="password" class="entrer" placeholder="Mot de passe" 
			style="margin-top: 80px;"/>
			<input type="password" class="entrer" placeholder="Confirmez mot de passe"/>
			<input type="submit" class="btn" value="INSCRIPTION" />
			<div><a href="Connexion.html" style="color: white;text-decoration: none;">
			Vous avez déjà un compte ? Connectez-vous ici</a></div>
		</form>
		
		
		</div>
		<div class="footer">
			<div class="col-2"><img src="img/EPA%20rogné.png"
					style="height:150px;margin:35px 0 0 20px" /></div>
			<div class="col-2 f2">
				Lorem ipsum dolor sit amet, consectetur <br>
				adipiscing elit, sed do eiusmod tempor <br>
				incididunt ut labore et dolore magna aliqua. <br>
				Ut enim ad minim veniam, quis nostrud <br>
				exercitationullamco laboris nisi ut aliquip <br>
				ex ea commodoconsequat. Duis aute irure dolor <br>
				in reprehenderit in voluptate velit esse cillum <br>
				dolore eu fugiatnulla pariatur. Excepteur sint <br>
				occaecat cupidatat non proident, sunt in culpa <br>
				qui officia deserunt mollit anim id est laborum.
			</div>
			<div class="col-3 f3">
				<div><a href="#">Qui sommes-nous?</a></div>
				<div><a href="#">FAQ Assistance</a></div>
				<div><a href="#">Mentions légales CGU</a></div>
		
			</div>
			<div class="col-2">
				<div class="f4">
					<a href="mailto:Xqy1402494129@gmil.com">Contact</a>
				</div>
			</div>
			<div class="col-2">
				<img src="img/Capture_d_écran_2021-09-29_à_11.34.09-removebg-preview.png"
					style="height:130px;margin:40px 0 0 40px">
			</div>
		</div>
	</body>
</html>
