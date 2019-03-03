<?php

class Sql {

    function add($name, $email, $gender, $isoDate){
        $PDO = db_connect();
        $sql = "INSERT INTO users(name, email, gender, birthdate) VALUES(:name, :email, :gender, :birthdate)";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birthdate', $isoDate);
        
        if ($stmt->execute()) {
            header('Location: index.php');
        } else {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
        }
    }

}