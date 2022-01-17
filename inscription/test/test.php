<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$x = "yuedouard@gmail.com";

	function selectAll($table, $champ, $donnee){
		require_once('includes/bdd.php');

		$sql = "SELECT * FROM `$table` WHERE (`$champ` = :donnee)";

		$stmt = $db->prepare($sql);

		$stmt->bindValue(":donnee", $donnee);

		$stmt->execute();

		return $stmt;

	}

	$stmt = selectAll("utilisateur", "email", $x);

	$verif = $stmt->fetch();

	echo "<pre>";
	var_dump($verif);
	echo "</pre>";
