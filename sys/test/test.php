<?php 
	session_start();
	$_SESSION['test'] = ['prenom' => "Edouard", 'nom' => "Yu"];
	$_SESSION['test']['prenom'] = "Ed";
	//unset($_SESSION['test']['prenom']);
	echo "<pre>";
	var_dump($_SESSION['test']);
	echo "</pre>";