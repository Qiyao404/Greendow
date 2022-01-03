<?php session_start();
    //include('includes/conn_db.php');
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



    //Validation de la connexion
    if(isset($_POST['login'])) {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->execute(array('email'=>$_POST['email'],'password'=>$_POST['password']));
        $verif = $stmt->rowCOunt();
        if($verif>0) {
            $_SESSION['email'] = $_POST['email'];
        }
        /////
        $_SESSION['array'] = (array('email'=>$_POST['email'],'password'=>$_POST['password']));
        $_SESSION['verif'] = $verif;
        $_SESSION['test'] = "mdr";
    }
?>
<html>
    <head>
    </head>
    <body>
        <form method="post" action="session.php">
            Connexion<br>
            <input type="email" name="email" value="steven.ngo@ibep.fr">
            <input type="text" name="password" value="hehehe"><br>
            <input type="submit" name="login" value="Let's go">
        </form>
    </body>
</html>