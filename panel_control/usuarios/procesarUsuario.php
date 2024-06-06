<?php

session_start();

include('../../bd.php');


$usuario_id = $_POST['usuario'];
$nuevo_rol = ($_POST['rol'] == 'Usuario') ? 'Usuario' : 'Administrador';

$sql = $conexion -> prepare("UPDATE users SET rol = '$nuevo_rol' WHERE id = $usuario_id'");

#Redirigimos
header('Location:index.php');
exit();
