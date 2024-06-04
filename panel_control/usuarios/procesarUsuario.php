<?php
include('../../bd.php');
session_start();

$usuario_id = $_POST['usuario'];
$nuevo_tipo = ($_POST['tipo'] == 'on' || $_POST['tipo'] == '1') ? 'usuario' : 'admin';

$sql = $conexion -> prepare("UPDATE users SET tipo = '$nuevo_tipo' WHERE id = $usuario'");

#Redirigimos
header('Location:index.php');
exit();
?>