<?php
    function selectAll($table, $champ, $donnee){
        require('bdd.php');

        $sql = "SELECT * FROM `$table` WHERE (`$champ` = :donnee)";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":donnee", $donnee);

        $stmt->execute();

        return $stmt;
    }


    function insertInto($insertType){ 
        require('bdd.php'); 
        if($insertType === "inscription"){
            $prenom = strip_tags($_POST["prenom"]);
            $nom = strip_tags($_POST["nom"]);
            $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

            $sql = "INSERT INTO `utilisateur`(`prenom`, `nom`, `email`, `mdp`, `roles`) VALUES (:prenom, :nom, :email, '$mdp','ROLE_USER')";

            $stmt = $db->prepare($sql);

            $stmt->bindValue(":prenom", $prenom);
            $stmt->bindValue(":nom", $nom);
            $stmt->bindValue(":email", $_POST["email"]);

            $stmt->execute();

            $id = $db->lastInsertId();
            
            $_SESSION["utilisateur"] = ["id" => $id, "prenom" => $prenom,
                "nom" => $nom, "email" => $_POST["email"], "roles" => "ROLE_USER"];
        }
    }