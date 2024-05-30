<?php
include ('../bd.php'); ?>

<?php

if ($_POST) {
    # Recogemos los datos del $_POST
    $Nombre = (isset($_POST["Nombre"]) ? $_POST["Nombre"] : "");
    $Descripccion = (isset($_POST["Descripccion"]) ? $_POST["Descripccion"] : "");
    $Familia = (isset($_POST["Familia"]) ? $_POST["Familia"] : "");
    $Precio = (isset($_POST["Precio"]) ? $_POST["Precio"] : "");
    $Imagen1 = (isset($POST["Imagen1"]) ? $_POST["Imagen1"] : "");
    $Imagen2 = (isset($POST["Imagen2"]) ? $_POST["Imagen2"] : "");
    $Imagen3 = (isset($POST["Imagen3"]) ? $_POST["Imagen3"] : "");

    # Insertamos los datos
    $sentencia = $conexion->prepare("INSERT INTO productos
(idId, Nombre, Descripccion, Familia, Precio, Imagen1, Imagen2, Imagen3) VALUES
(NULL, :Nombre, :Descripccion, :Familia, :Precio, :Imagen1, :Imagen2, :Imagen3);");

    # Asignamos los valores
    $sentencia->bindParam(":Nombre", $Nombre);
    $sentencia->bindParam(":Descripccion", $Descripccion);
    $sentencia->bindParam(":Familia", $Familia);
    $sentencia->bindParam(":Precio", $Precio);

    # Adjuntamos foto
    $fecha_ = new DateTime();

    $nombreArchivo_Imagen1 = ($Imagen1 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen1"]['name'] : "";
    $tmp_Imagen1 = $_FILES["Imagen1"]['tmp_name'];
/*
    if ($tmp_Imagen1 != '') {
        move_uploaded_file($tmp_Imagen1, "./" . $nombreArchivo_Imagen1);
    }

    $nombreArchivo_Imagen2 = ($Imagen2 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen2"]['name'] : "";
    $tmp_Imagen2 = $_FILES["Imagen2"]['tmp_name'];

    if ($tmp_Imagen2 != '') {
        move_uploaded_file($tmp_Imagen2, "./" . $nombreArchivo_Imagen2);
    }

    $nombreArchivo_Imagen3 = ($Imagen3 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen3"]['name'] : "";
    $tmp_Imagen3 = $_FILES["Imagen3"]['tmp_name'];

    if ($tmp_Imagen3 != '') {
        move_uploaded_file($tmp_Imagen3, "./" . $nombreArchivo_Imagen3);
    }*/

    $sentencia->bindParam(":Imagen1", $nombreArchivo_Imagen1);
    $sentencia->bindParam(":Imagen2", $nombreArchivo_Imagen2);
    $sentencia->bindParam(":Imagen3", $nombreArchivo_Imagen3);

    # Ejecutamos

    $sentencia->execute();
    header("Location:index.php");
    die();
}

?>

<?php include('../templates/header.php'); ?>

    <h4 class="subtitle">Datos del producto</h4>

    <div class="card-form">
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="line">
                <label for="Nombre" class="form-label">Nombre</label>
                <br>
                <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre">
            </div>
            
            <div class="line">
                <label for="descripccion" class="form-label">Descripción</label>
                <br>
                <input type="text" class="form-control" name="descripccion" id="descripccion" placeholder="Descripción">
            </div>
            
            <div class="line">
                <label for="Familia" class="form-label">Categoría</label>
                <br>
                <input type="text" class="form-control" name="Familia" id="Familia" placeholder="Categoría">
            </div>
            
            <div class="line">
                <label for="Precio" class="form-label">Precio</label>
                <br>
                <input type="text" class="form-control" name="Precio" id="Precio" placeholder="Precio">
            </div>
            
            <div class="line">
                <label for="Imagen1" class="form-label">Imagen 1</label>
                <br>
                <input type="file" class="form-control" name="Imagen1" id="Imagen1" placeholder="Imagen1">
            </div>
        
            <div class="line">
                <label for="Imagen2" class="form-label">Imagen 2</label>
                <br>
                <input type="file" class="form-control" name="Imagen2" id="Imagen2" placeholder="Imagen2">
            </div>
        
            <div class="line">
                <label for="Imagen3" class="form-label">Imagen 3</label>
                <br>
                <input type="file" class="form-control" name="Imagen3" id="Imagen3" placeholder="Imagen3">
            </div>

            <button type="submit" class="btn-success">Agregar registro</button>
            <a href="index.php" class="btn-danger">Cancelar</a>
        </form>
    </div>

    <?php include('../templates/footer.php'); ?>