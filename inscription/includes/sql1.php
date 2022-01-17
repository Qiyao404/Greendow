<?php
    function selectAll($table, $champ){
        return "SELECT * FROM `$table` WHERE (`$champ` = :donnee)";
    }

    function insertInto($insertType){
        if($insertType === "inscription"){
            return "INSERT INTO `utilisateur`(`prenom`, `nom`, `email`, `mdp`, `roles`) VALUES (:prenom, :nom, :email, '$mdp','ROLE_USER')";
        }
    }