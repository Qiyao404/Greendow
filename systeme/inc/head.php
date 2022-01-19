<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $titre ?? "Greendow" ?></title>
		<link rel="shortcut icon" href="img/GW.ico" />
		<?php
		 	if($_SERVER["SCRIPT_NAME"] === "/systeme/index.php"){
		 		echo '<link rel="stylesheet" href="css/header1.css">';
		 		echo '<link rel="stylesheet" href="css/index.css">';
				echo '<link rel="stylesheet" href="css/footer.css">';
			}
			elseif($_SERVER["SCRIPT_NAME"] === "/systeme/login.php"){
				echo '<link rel="stylesheet" href="css/header2.css">';
				echo '<link rel="stylesheet" href="css/login.css">';
				echo '<link rel="stylesheet" href="css/footerconnect.css">';
			}
			elseif($_SERVER["SCRIPT_NAME"] === "/systeme/register.php"){
				echo '<link rel="stylesheet" href="css/header2.css">';
				echo '<link rel="stylesheet" href="css/register.css">';
				echo '<link rel="stylesheet" href="css/footerconnect.css">';
			}
		?>
      	<script src="javascript.js" defer ></script>
	</head>
	<body>

