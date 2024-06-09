<?php

session_start();

ob_start(); //Inicia el almacenamiento en el búfer de salida

include ("../../bd.php");

include ("../../templates/header.php");
?>

<?php

if ($_POST) { #Si se envía el formulario...

    #Recogemos datos del $_POST
    $name = (isset($_POST["name"]) ? $_POST["name"] : "");

    #Insertamos los datos
    $sentencia = $conexion->prepare("INSERT INTO familias
    (name, Imagen) VALUES
    (:name, :Imagen);");

    #Asignamos los valores
    $sentencia->bindParam(":name", $name);

    #Adjuntamos Imagen
    $fecha_ = new DateTime();

    $nombreArchivo_Imagen = (isset($_FILES["Imagen"]) && $_FILES["Imagen"]["name"] != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen"]['name'] : "";
    $tmp_Imagen = $_FILES["Imagen"]['tmp_name'];

    if ($tmp_Imagen != '') {
        move_uploaded_file($tmp_Imagen, "../../assets/img/" . $nombreArchivo_Imagen);
    }

    #Asignamos parámetro de Imagen
    $sentencia->bindParam(":Imagen", $nombreArchivo_Imagen);

    #Ejecutamos
    $sentencia->execute();
    header("Location:index.php");
    exit(); //Asegura que el script se detiene después del redireccionamiento 
}
?>

<h4 class="subtitle"> Datos de la familia </h4>

<div class="card-form">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="line">
            <label for="name" class="form-label">Nombre</label>
            <br>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
        </div>

        <div class="line">
            <label for="Imagen" class="form-label">Imagen</label>
            <br>
            <input type="file" class="form-control" name="Imagen" id="Imagen" placeholder="Imagen">
        </div>

        <button type="submit" class="btn-success">Agregar registro</button>
        <a href="index.php" class="btn-danger">Cancelar</a>
    </form>
</div>

<?php
ob_end_flush(); //Envía el contenido almacenado en el búfer y desactiva el almacenamiento en el búfer de salida
include ("../../templates/footer.php");
?>