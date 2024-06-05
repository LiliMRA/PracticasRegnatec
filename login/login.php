<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

require('../bd.php');

$url_base = "http://localhost/practicasregnatec/";

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conexion->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if ($results && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: index.php');
    } else {
        $message = 'Lo siento, los datos no coinciden';
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
    <link rel="stylesheet" type="text/css" href="../assets/css/index_Login.css">
</head>

<body>

    <header>
        <a href="../index.php">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
            Volver a ByteStore
        </a>
    </header>

    <div class="clr"></div>

    <div class="signup">

        <div class="login-Title">
            <h2>
                Inicia sesión
            </h2>
            <span>o <a href="signup.php">Regístrate</a></span>
        </div>

        <div class="verifyUser">
            <?php if (!empty($message)) : ?>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>

                    <?= $message ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="signupCard">
            <div class="signupImg">
                <img src="../assets/img/logotipo.png" alt="Imagen-logotipo">
            </div>



            <form action="login.php" method="post">
                <div class="formContent">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                    <button type="submit" id="signup-Button" value="Enviar">Enviar</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>