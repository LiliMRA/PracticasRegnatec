<?php
session_start();
require('../bd.php');


$url_base = "http://localhost/practicasregnatec/";

if (isset($_SESSION['user_id'])) {
    $records = $conexion->prepare('SELECT id, usuario, email, password, rol FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    #Verificamos si $results no es false antes de usar count()
    if ($result !== false && count($result) > 0) {
        $user = $result;
    }
//} else {
    #Si el usuario no está logeado, lo redirigimos a la pág para iniciar sesión
   // header('Location:index.php');
   // exit(); #Aeguramos que el script se detenga después de hacer la redirección
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore - Inicio sesión</title>
    <link rel="icon" href="<?php echo $url_base; ?>/assets/img/logotipo.png">
    <link rel="stylesheet" href="<?php echo $url_base; ?>/assets/css/index_Login.css">
</head>

<body>

    <div class="main-login">

        <header>
            <a href="<?php echo $url_base; ?>/index.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>Volver a ByteStore
            </a>
        </header>
<!--
        <div class="alertContainer">
            <?php #if (!empty($user)) : ?>
                <br>
                <p>Bienvenido <span class="userName"><?php #$user['usuario']; ?> </span> </p>
                Sesión iniciada
                <br>
                <a class="logoutButton" href="<?php # echo $url_base; ?>login/logout.php"> Cerrar sesión</a>
        </div>-->

    <?php #else : ?>

        <div class="signup">
            <div class="login-Title">
                <h2>
                    Inicia sesión o Registrate
                </h2>
            </div>

            <div class="shortcutContent">
                <a href="<?php echo $url_base; ?>/login/login.php"> Iniciar sesión</a>
                |
                <a href="<?php echo $url_base; ?>/login/signup.php"> Regístrate </a>
            </div>

            <div class="loginImg">
                <img src="<?php echo $url_base; ?>/assets/img/MacBook.png" alt="Imagen-portátil">
            </div>
        </div>





    <?php #endif; ?>
    </div>


</body>

</html>