<?php
ob_start(); #Inicia el almacenamiento en el búfer de salida

include ('../../bd.php');

include ('../../templates/headerAdmin.php');
?>

<?php

#Obtenemos el ID del usuario a editar
$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

if (isset($_GET['txtID'])) {
    try {
        $sentencia = $conexion->prepare("SELECT * FROM users WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        #Ejecutamos
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($registro) {
            $usuario = $registro['usuario'];
            $email = $registro['email'];
            $password = $registro['password'];
            $rol = $registro['rol'];
        } else {
            echo "Usuario no encontrado.";
            exit();
        }
    } catch (PDOException $ex) {
        echo "Error: " . $ex->getMessage();
        exit();
    }
} else {
    echo "ID de usuario no especificado.";
    exit();
}

if ($_POST) {
    #Recogemos los datos del $_POST
    #$txtID = (isset($_POST["txtID"]) ? $_POST["txtID"] : "");
    $usuario = (isset($_POST["usuario"]) ? $_POST["usuario"] : "");
    $email = (isset($_POST["email"]) ? $_POST["email"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");
    $rol = (isset($_POST['rol']) ? $_POST['rol'] : "");

    try {
        #Preparamos la inserción de los datos
        $sentencia = $conexion->prepare("UPDATE users SET
    usuario = :usuario,
    email = :email,
    password = :password,
    rol = :rol
    WHERE id = :id");

        #Asignamos los parámetros
        $sentencia->bindParam(":id", $txtID);
        $sentencia->bindParam(":usuario", $usuario);
        $sentencia->bindParam(":email", $email);
        $sentencia->bindParam(":password", $password);
        $sentencia->bindParam(":rol", $rol);
        #Ejecutamos
        $sentencia->execute();
        #Redirigimos a la pág principal
        header('Location: index.php');
        exit(); #Asegura que el script se detiene desdpués del redireccionamiento
    } catch (PDOException $ex) {
        echo "Error: " . $ex->getMessage();
        exit();
    }
}
?>

<h4 class="subtitle"> Datos del usuario </h4>

<div class="card-form">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="line">
            <label for="usuario" class="form-label"> Usuario </label>
            <input type="text" value="<?php echo $usuario; ?>" class="form-control" name="usuario" id="usuario"
                placeholder="Usuario">
        </div>

        <div class="line">
            <label for="email" class="form-label"> Email </label>
            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" id="email"
                placeholder="Email">
        </div>

        <div class="line">
            <label for="password" class="form-label"> Contraseña </label>
            <input type="text" value="<?php echo $password; ?>" class="form-control" name="password" id="password"
                readonly>
        </div>

        <div class="line">
            <label for="rol" class="form-label"> Rol </label>
            <input type="text" value="" class="form-control" name="rol" id="rol" placeholder="Administrador | Usuario">
        </div>

        <button type="submit" class="btn-success"> Actualizar </button>
        <a href="index.php" class="btn-danger"> Cancelar </a>
    </form>
</div>

<?php
ob_end_flush(); #Envía el contenido almacenado en el búfer y desactiva el almacenamiento en el búfer de salida
include ('../../templates/footer.php');
?>