<?php 
	session_start();

	if(!isset($_SESSION['auth'])){
		header('Location: login.php');
		exit;
	}
	unset($_SESSION['auth']);
	header('location: index.php');

