<?php
include('../../bd.php');
session_start();

$usuario_id = $_POST['usuario'];
$nuevo_rol = ($_POST['rol'] == 'Usuario') ? 'Usuario' : 'Administrador';

$sql = $conexion -> prepare("UPDATE users SET tipo = '$nuevo_tipo' WHERE id = $usuario'");

#Redirigimos
header('Location:index.php');
exit();
