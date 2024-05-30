<?php 
session_start();
require '../bd.php';

if (isset($_SESSION['user_id'])) {
    $records = $conexion -> prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records -> bindParam(':id', $_SESSION['user_id']);
    $records -> execute();
    $results = $records -> fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
$user = $results;
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
    <link rel="stylesheet" href="index.css">
</head>
<body>

<header>
    <a href="../index.html">ByteStore</a>
</header>

<?php if (!empty($user)) : ?>
    <br> Bienvenido. <?= $user['email'] ?>
    <br> Sesión iniciada
    <a href="logout.php"> Cerrar sesión</a>

    <?php else : ?>
<h1>
    Inicia sesión o Registrate
</h1>

<a href="login.php"> Iniciar sesión</a>
<a href="signup.php"> Regístrate </a>

<?php endif; ?>
    
</body>
</html>