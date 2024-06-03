<?php

session_start();

$url_base = "http://localhost/practicasregnatec/";

if (isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

require ('../bd.php');

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conexion -> prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records -> bindParam(':email', $_POST['email']);
    $records -> execute();
    $result = $records -> fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: login.php');
    } else {
        $message = 'Lo siento, los datos no coinciden';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore - Inicio sesión</title>
    <link rel="icon" href="img/logotipo.png">
    <link rel="stylesheet" href="index_Login.css">
</head>

<body>

    <header>
        <a href="../index.php">Volver a ByteStore</a>
    </header>

    <h1>
        Inicia sesión
    </h1>
    <span>o <a href="signup.php">Regístrate</a></span>

    <?php if (!empty($message)) : ?>
        <p> <?= $message ?> </p>
        <?php endif ?>

    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" value="Enviar">
    </form>

</body>

</html>