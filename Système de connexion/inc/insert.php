<?php
    require ('conn_db.php');
    $stmt = $db->prepare("INSERT INTO users (name, email, password, user_type) VALUES (:name, :email, :password, 'client');");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
		
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt->execute();
    // $db = "INSERT INTO users (name, email, password, user_type) VALUES ($name, $email, $password, 'client');");
    echo 'inséré :'.$name ;
?>