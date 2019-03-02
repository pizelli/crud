<?php

require_once 'init.php';

// take the form data
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;


// validation (very simple, just to avoid empty data)
if (empty($name) || empty($email) || empty($gender) || empty($birthdate)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// the date comes in the format dd/mm/YYYY
// so we need to convert to YYYY-mm-dd
$isoDate = dateConvert($birthdate);

// insert in the bank
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