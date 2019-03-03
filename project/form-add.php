<?php
require 'init.php';
require 'sql.php';

// take the form data
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;


// validation (very simple, just to avoid empty data)
if(count($_POST)){
    if (empty($name) || empty($email) || empty($gender) || empty($birthdate)) {
        echo "Volte e preencha todos os campos";
        exit;
    }
}

// the date comes in the format dd/mm/YYYY
// so we need to convert to YYYY-mm-dd
$isoDate = dateConvert($birthdate);

if($name != null){
    $sql = new Sql();
    $sql->add($name, $email, $gender, $isoDate);
}


?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>Cadastro de Usuário</title>
</head>

<body>

<h1>Sistema de Cadastro</h1>

<h2>Cadastro de Usuário</h2>

<form method="post">
    <label for="name">Nome: </label>
    <br>
    <input type="text" name="name" id="name">

    <br><br>

    <label for="email">Email: </label>
    <br>
    <input type="text" name="email" id="email">

    <br><br>

    Gênero:
    <br>
    <input type="radio" name="gender" id="gener_m" value="m">
    <label for="gener_m">Masculino </label>
    <input type="radio" name="gender" id="gener_f" value="f">
    <label for="gener_f">Feminino </label>

    <br><br>

    <label for="birthdate">Data de Nascimento: </label>
    <br>
    <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY">

    <br><br>

    <input type="submit" value="Cadastrar">
</form>

</body>
</html>