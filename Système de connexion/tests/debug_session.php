<?php
session_start();

function debug($variable) {
    echo '<pre>'.print_r($variable,true).'</pre>';
}

echo "Debug :";

var_dump($_SESSION);
?><br>


<html>
    <body>
        <p>Connecté : <?= $_SESSION['auth'][1] ?></p>
        <p>email : <?= $_SESSION['auth'][2] ?></p>
        <p>statut :<?=  $_SESSION['auth'][4] ?></p>
        <a href="register.php">Retour</a>
    <body>
<html>