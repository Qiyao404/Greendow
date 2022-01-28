<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport"
			content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
		<title><?= $titre ?? "Greendow" ?></title>
		<link rel="shortcut icon" href="img/GW.ico"/>
		<link rel="stylesheet" type="text/css" href="css/topnav.css"/>
		<link rel="stylesheet" type="text/css" href="css/tryfooter.css">
		<?php
			if(isset($_SESSION['auth']) && $_SERVER["SCRIPT_NAME"] !== "/sys/modification.php"){
				echo '<link rel="stylesheet" type="text/css" href="css/popup.css">';
				echo '<script src="js/popup.js" defer></script>';
			}

		 	if($_SERVER["SCRIPT_NAME"] === "/sys/index.php"){
		 		echo '<link rel="stylesheet" type="text/css" href="css/tryindex.css"/>';
			}
			elseif($_SERVER["SCRIPT_NAME"] === "/sys/login.php"){
				echo '<link rel="stylesheet" type="text/css" href="css/login2.css">';
			}
			elseif($_SERVER["SCRIPT_NAME"] === "/sys/register.php" || $_SERVER["SCRIPT_NAME"] === "/sys/modification.php"){
				echo '<link rel="stylesheet" href="css/register2.css">';
			}

			if($_SERVER["SCRIPT_NAME"] === "/sys/modification.php" && isset($_SESSION['auth'])){
				echo '<script src="js/modification.js" defer></script>';
			}	
		?>
	</head>
	<body>



