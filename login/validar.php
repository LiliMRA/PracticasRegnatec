<?php

session_start();

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $_SESSION['usuario'] = $usuario;

    try {
        $conexion = new PDO("mysql:host=$servidor; dbname=$baseDeDatos", $usuario, $contrasenia);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conexion->prepare("SELECT * FROM users WHERE usuario = '$usuario' AND password = '$password' AND rol = '$rol'");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':rol', $rol);

        if ($stmt->execute()) { #Verificar si la consulta fue exitosa
            $filas = $stmt->fetch(PDO::FETCH_ASSOC);

            echo "Consulta exitosa. Usuario encontrado. <br>";

            if ($filas && isset($filas['rol'])) {
                if (password_verify($password, $filas['password'])) {

                    echo "Contraseña verificada. <br>";

                    if ($filas['rol'] == 'Administrador') {
                        header('Location:../admin.php');
                        exit();
                    } else if ($filas['rol' == 'Usuario']) {
                        header('Location:index.php');
                        exit(); #Detenemos el scritp después de redirigir
                    }
                }
            }
        }
    } catch (PDOException $ex) {
        echo "Error en la conexión: " . $e->getMessage();
    }
}
