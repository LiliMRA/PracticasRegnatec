<?php
require('../bd.php');

$url_base = "http://localhost/practicasregnatec/";

$message = ''; #Variable global para los msg

if (!empty($_POST['email']) && !empty($_POST['password'])) { #Si los campos NO están vacíos....
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $sentencia = $conexion->prepare($sql); #Conectamos con la BBDD

    #Asignamos parámetros
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); #Ciframos la constraseña
    $stmt->bindParam(':password', $password);


    if ($stmt->execute()) {
        $message = "Usuario creado correctamente";
    } else {
        $message = "Lo siento, ha habido un error al crear el usuario";
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

    <div class="main-login">

        <header>
            <a href="../index.php">Volver a ByteStore</a>
        </header>

        <div class="clr"></div>

    </div>

    <div class="signup">

        <?php
        if (!empty($message)) : ?>
            <p> <?= $message ?> </p>
        <?php endif ?>

        <div class="login-Title">
            <h2>
                Regístrate
            </h2>
            <span>o <a href="login.php">Inicia sesión</a></span>
        </div>

        <div class="singupCard-box">
            <div class="signupCard">
                <div class="signupImg">
                    <img src="../assets/img/logotipo.png" alt="Imagen-logotipo">
                </div>

                <form action="signup.php" method="post">
                    <div class="formContent">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario" placeholder="Usuario">

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email">

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="Contraseña">

                        <label for="confirm_password">Confirmar contraseña</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmar contraseña">
                        <button type="submit" id="signup-Button" value="Enviar">Enviar</button>
                    </div>

                </form>
            </div>

        </div>


    </div>



</body>

</html>