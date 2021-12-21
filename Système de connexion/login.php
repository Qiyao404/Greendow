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
			.Connexion{
				position: absolute;
				top: 50%;
				margin-top: -250px;
				left: 50%;
				margin-left: -200px;
				background-color: rgba(0,0,0,0.15);
				width: 400px;
				height: 400px;
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
		<?php include ('inc/header1.php'); ?>
				
		<form action="" method="post" class="Connexion">
			<p>Connexion</p>
			<input type="email" class="entrer" id="email" placeholder="  Adresse mail" name="email"/>
			<input type="password" class="entrer" id="password" placeholder="  Mot de passe" name="password"/>
			<a href="#" style="float: right;margin-right: 40px;color: white; text-decoration: none;margin-bottom: 15px;">Mot de passe oublié</a>
			<input name="login" type="submit" class="btn" value="CONNEXION"/>
			<div><a href="register.php" style="color: white;text-decoration: none;">Vous n'avez pas de compte ? Créez-en un ici </a></div>
		</form>

		<?php include('inc/footer.php'); ?>

	</body>
</html>
