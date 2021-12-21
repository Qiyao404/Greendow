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
			.col-2,
			{
				display: block;
				position: relative;
				min-height: 1px;
				float: left;
			}
			.col-2 {
				width: 20%;
			}
			.top-nav a {
				height: 80px;
				line-height: 80px;
				text-decoration: none;
				color: black;
				font-size: 20px;
			}
			
			.top-nav a:hover {
				color: royalblue;
			}
			.Inscription{
				position: absolute;
				top: 50%;
				margin-top: -350px;
				left: 50%;
				margin-left: -200px;
				background-color: rgba(0,0,0,0.3);
				width: 400px;
				height: 600px;
				border-radius: 25px;
				text-align: center;
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
				width: 1920px;
				background-color: rgba(34,140,34,0.8);
				position: absolute;
				margin: 645px 0 0 0;
			}
			
			.f2 {
				color: white;
				margin-top: 10px;
				font-size: 14px;
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
		
		<form action="" class="Inscription" method="post">
			<p>Inscription</p>
			<input type="text" class="entrer" placeholder="Nom complet" name="name"/>
			<input type="text" class="entrer" placeholder="Adresse mail" name="email"/>
			<input type="text" class="entrer" placeholder="Confirmez adresse email" name="c_email"/>
			<input type="password" class="entrer" placeholder="Mot de passe" name="password"/>
			<input type="password" class="entrer" placeholder="Confirmez mot de passe" name="c_password"/>
			<input type="submit" class="btn" value="INSCRIPTION" />
			<div><a href="login.php" style="color: white;text-decoration: none;">
			Vous avez déjà un compte ? Connectez-vous ici</a></div>
		</form>


		
		</div>

		<?php //include('inc/footer.php'); ?>

	</body>
</html>
