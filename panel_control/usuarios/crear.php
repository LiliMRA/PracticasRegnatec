<?php
ob_start(); #Inicia el almacenamiento en el búfer de salida

include('../../templates/headerAdmin.php');

include('../../bd.php');
?>

<?php
#Código para eliminar un usuario
if ($_POST) {
    #Recogemos datos
    $usuario = (isset($_POST["usuario"]) ? $_POST["usuario"] : "");
    $email = (isset($_POST["email"]) ? $_POST["email"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");

    #Insertamos datos
    $sentencia = $conexion -> prepare("INSERT INTO users
    (usuario, email, password) VALUES
    (:usuario, :email, :password);");

    #Asignamos parámetros 
    $sentencia -> bindParam(":usuario", $usuario);
    $sentencia -> bindParam(":email", $email);
    $sentencia -> bindParam(":password", $password);

    #Ejecutamos
    $sentencia -> execute();
    header('Location: index.php'); #Redirigimos a la pág principal
    exit(); #Asegura que el script se detiene después del redireccionamiento
}
?>

<h4 class="subtitle"> Datos del usuario </h4>

<div class="card-form">
    <form action="" method="post" enctype="text/plain">

    <div class="line">
        <label for="name" class="form-label"> Usuario </label>
        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
    </div>

    <div class="line">
        <label for="email" class="form-label"> Email </label>
        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Email">
    </div>

    <div class="line">
        <label for="password" class="form-label"> Contraseña </label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
    </div>

    <button type="submit" class="btn-success"> Agregar usuario </button>
    <a href="index.php" class="btn-danger"> Cancelar </a>
    </form>
</div>

<?php
ob_end_flush(); #Envía el contenido almacenado en el búfer y desactiva el almacenamiento en el búfer de salida
include("../../templates/footer.php");
?>

