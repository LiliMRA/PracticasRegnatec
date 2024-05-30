

<?php

$servidor= "127.0.0.1";
$baseDeDatos = "bytestore";
$usuario = "root";
$contrasenia = "";
#0790

try {
    $conexion = new PDO("mysql:host=$servidor; dbname=$baseDeDatos", $usuario, $contrasenia);
} catch (PDOException $ex) {
    die('Conexión fallida: '. $ex -> getMessage());
}
    ?>