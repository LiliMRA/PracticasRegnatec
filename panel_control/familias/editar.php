<?php

session_start();

ob_start(); #Inicia el almacenamiento en el búfer de salida

include('../../bd.php');

include('../../templates/header.php');
?>

<?php

$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

if (isset($_GET['txtID'])) {

    #Llamamos a la BBDD
    $sentencia = $conexion->prepare("SELECT * FROM familias WHERE id = :id");

    #Asignamos parámetros
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $name = $registro['name'];
}

if ($_POST) { #Si se envía el formulario...

    #Recogemos los datos
    $name = (isset($_POST['name']) ? $_POST['name'] : "");

    #Insertamos los datos
    $sentencia = $conexion->prepare("UPDATE familias SET 
    name = :name
    WHERE id = :id");

    #Asignamos los parámetros
    $sentencia->bindParam(":name", $name);
    $sentencia->bindParam(":id", $txtID);
    $sentencia -> execute();

    #IMGANEN..
    $Imagen = (isset($_FILES["Imagen"]['name']) ? $_FILES["Imagen"]['name'] : "");

    $fecha_ = new DateTime();
    $nombreArchivo_Imagen = ($Imagen != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen"]['name'] : "";

    $tmp_Imagen = $_FILES["Imagen"]['tmp_name'];

    if ($tmp_Imagen != '') {
        move_uploaded_file($tmp_Imagen, "./" . $nombreArchivo_Imagen);

        #Buscamos el archivo relacionado con el id de la familia
        $sentencia = $conexion->prepare("SELECT Imagen FROM familias WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        #Si existe el archivo Imagen, lo borramos
        if (isset($registro_recuperado["Imagen"]) && $registro_recuperado["Imagen"] != "") {
            if (file_exists("./" . $registro_recuperado["Imagen"])) {
                unlink("./" . $registro_recuperado["Imagen"]);
            }
        }

        #Ejecutamos
        $sentencia = $conexion->prepare("UPDATE familias SET Imagen = :Imagen WHERE id = :id");
        $sentecia->bindParam(":Imagen", $nombreArchivo_Imagen);
        $sentecia->bindParam(":id", $txtID);
        $sentecia->execute();
    }

    header("Location:index.php"); #Redirigimos a la pág pricipal
    exit(); #Asegura que el script se detiene después del redireccionamiento
}
?>

<h4 class="subtitle"> Datos de la familia</h4>

<div class="card-form">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="line">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" value="<?php echo $name; ?>" class="form-control" name="name" id="name" placeholder="Nombre">
        </div>

        <div class="line">
            <label for="Imagen" class="form-label">Imagen </label>
            <input type="file" class="form-control" name="Imagen" id="Imagen" placeholder="Imagen">
        </div>

        <button type="submit" class="btn-success">Actualizar</button>
        <a href="index.php" class="btn-danger">Cancelar</a>
    </form>
</div>

<?php
ob_end_flush(); #Envía el contenido almacenado en el búfer y desactiva el almacenamient en el búfer de salida
include('../../templates/footer.php');
?>
