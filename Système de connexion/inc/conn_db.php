<?php
    try{
        //Identifiants :
        $db_username = 'root';
        $db_password = 'root';
        $db_server = 'localhost';
        //$db = new PDO('mysql:host=$db_server;dbname=greendow_testdb;charset=utf8', $db_username, $db_password);
        $db = new PDO('mysql:host=localhost;dbname=greendow_testdb;charset=utf8', 'root', 'root');
    }
    catch (PDOException $e){
        die('Erreur connexion db : ' . $e->getMessage());
    }
?>