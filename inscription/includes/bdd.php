<?php
    try{
        $dbhote = "localhost";
        $dbname = "compte";
        $dbuser = "root";
        $dbpass = "";
        $db = new PDO("mysql:host=".$dbhote.";dbname=".$dbname.";charset=utf8", $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        die("Erreur :".$e->getMessage());
    }

