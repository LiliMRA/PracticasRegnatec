<?php
session_start();
require ('../bd.php');

$url_base = "http://localhost/practicasregnatec/";

if (isset($_SESSION['user_id'])) {
    $records = $conexion->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore - Inicio sesión</title>
    <link rel="icon" href="../assets/img/logotipo.png">
    <link rel="stylesheet" href="../assets/css/index_Login.css">
</head>

<body>

    <div class="main-login">

        <header>
            <a href="../index.php">Volver a ByteStore</a>
        </header>

        <?php if (!empty($user)): ?>
            <br> Bienvenido. <?= $user['email'] ?>
            <br> Sesión iniciada
            <a href="logout.php"> Cerrar sesión</a>

        <?php else: ?>

            <div class="signup">
                <div class="login-Title">
                    <h2>
                        Inicia sesión o Registrate
                    </h2>
                </div>

                <div class="shortcutContent">
                    <a href="login.php"> Iniciar sesión</a>
                    |
                    <a href="signup.php"> Regístrate </a>
                </div>

                <div class="loginImg">
                    <img src="../assets/img/MacBook.png" alt="Imagen-portátil">
                </div>
            </div>





        <?php endif; ?>
    </div>


</body>

</html>