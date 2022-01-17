<?php 
	function erreur(){
		error_reporting(E_ALL);
		return ini_set("display_errors", 1);
 	}

/* utiliser require_once('../inscription/test/erreur.php');
si on veut le mettre dans un fichier php du dossier includes, puis mettre erreur();*/