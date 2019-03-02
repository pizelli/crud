<?php

require_once 'init.php';

// takes the URL ID
$id = isset($_GET['id']) ? $_GET['id'] : null;

// valid ID
if (empty($id)) {
    echo "ID não informado";
    exit;
}

// remove from bank
$PDO = db_connect();
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}