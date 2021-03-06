<?php

require_once('inc/session.php');
require_once('inc/functions.php');
$errors = '';

if(!empty($_SESSION['auth'])) {
	header('location:index.php');
}

if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
    require_once('inc/conn_db.php');
    $req = $db->prepare('SELECT * FROM users WHERE email = :email');
    $req->execute(['email' => $_POST['email']]);
    $user = $req->fetch();
    if($user == null){
        $errors['login'] = 'Identifiant ou mot de passe incorrect';
    }elseif($_POST['password'] == $user['password']){
        $_SESSION['auth'] = $user;
        header('Location: index.php');
        exit();
    }else{
        $errors['login'] = 'Identifiant ou mot de passe incorrect';
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<link rel="shortcut icon" href="img/GW.ico" />
		<style type="text/css">
			*{
				margin: 0;
				-ms-user-select: none;
			}
			body{
				background: url(img/Connexion%20BG.jpg) no-repeat;
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

			.top-nav{
				background-color: white;
				height : 85px;
			}

			.top-nav a:hover {
				color: royalblue;
			}

			.Connexion{
				position: absolute;
				top: 50%;
				margin-top: -175px;
				left: 50%;
				margin-left: -200px;
				background-color: rgba(0,0,0,0.15);
				width: 400px;
				height: 400px;
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
				font-family: Century Gothic;
			}
			.btn{
				background-color: seagreen;
				width: 70%;
				height: 48px;
				border-radius: 8px;
				margin-top: 20px;
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
			.Connexion a:hover{
				color: #4169E1!important;
			}
			
			.footer {
				display: flex;
				justify-content: space-around;
				height: 212px;
				width: 1920px;
				background-color: rgba(34,140,34,0.8);
				position: absolute;
				margin: 700px 0 0 0;
				width : 100%;
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
		<!-- <div class="top-nav">
			<div class="container clearf">
				<div class="fl"><a href="index.html"><img src="img/Capture_d_??cran_2021-09-29_??_11.34.09-removebg-preview.png"
							style="height: 80px;"></a>
				</div>
				<div class="fl">
					<a href="#" style="margin-left: 60px;">Pourquoi Greendow</a>
					<a href="#">| FAQ |</a>
					<a href="#">Acheter</a>
				</div>
				<div class="fr">
					<a href="Connexion.html">Connexion</a>
					<a href="#">| Support</a>
				</div>
			</div>
		</div> -->
		
		<?php include ('inc/header1.php'); ?>

		<form action="" class="Connexion">
			<p>Connexion</p>
			<input type="text" class="entrer" placeholder="Adresse mail"/>
			<input type="password"/ class="entrer" placeholder="Mot de passe">
			<a href="#" style="float: right;margin-right: 40px;color: white;
			text-decoration: none;margin-bottom: 15px;">Mot de passe oubli??</a>
			<input type="submit" class="btn" value="CONNEXION"/>
			<div><a href="Inscripton.html" style="color: white;text-decoration: none;">Vous n'avez pas de compte ? Cr??ez-en un ici </a></div>
		</form>

		<?php include('inc/footer.php'); ?>		
		
		
		</div>
		<!-- <div class="footer">
			<div class="col-2"><img src="img/EPA%20rogn??.png"
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
				<div><a href="#">Mentions l??gales CGU</a></div>
		
			</div>
			<div class="col-2">
				<div class="f4">
					<a href="mailto:Xqy1402494129@gmil.com">Contact</a>
				</div>
			</div>
			<div class="col-2">
				<img src="img/Capture_d_??cran_2021-09-29_??_11.34.09-removebg-preview.png"
					style="height:130px;margin:40px 0 0 40px">
			</div>
		</div> -->
	</body>
</html>
