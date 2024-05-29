<?php
    require '../bd.php';

    $message = ''; #Variable global para los msg

    if (!empty($_POST['email']) && !empty($_POST['password'])) { #Si los campos NO están vacíos....
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $sentencia = $conexion->prepare($sql); #Conectamos con la BBDD

        #Asignamos parámetros
        $stmt -> bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); #Ciframos la constraseña
        $stmt -> bindParam(':password', $password);
    }

    if ($stmt -> execute()) {
        $message = "Usuario creado correctamente";
    } else {
        $message = "Lo siento, ha habido un error al crear el usuario";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore - Inicio sesión</title>
    <link rel="icon" href="img/logotipo.png">
    <link rel="stylesheet" href="index.css">
</head>
<body>

<header>
    <a href="../index.html">ByteStore</a>
</header>

<?php
    if (!empty($message)) : ?>
    <p> <?= $message ?> </p>
    <?php endif ?>

<h1>
    Registrate
</h1>
<span>o <a href="login.php">Inicia sesión</a></span>

<form action="singup.php" method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Contraseña">
    <input type="password" name="confirm_password" placeholder="Confirmar contraseña">
    <input type="submit" value="Enviar">
</form>
    
</body>
</html>