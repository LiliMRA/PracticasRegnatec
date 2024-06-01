<?php include ("../../bd.php"); 
include('../../templates/header.php'); ?>

<?php

$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

if (isset($_GET['txtID'])) {

    $sentencia = $conexion->prepare("SELECT * FROM productos WHERE idId=:idId");
    $sentencia->bindParam(":idId", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $Nombre = $registro['Nombre'];
    $Descripccion = $registro['Descripccion'];
    $Familia = $registro['Familia'];
    $Precio = $registro['Precio'];
    $Imagen1 = $registro['Imagen1'];
    $Imagen2 = $registro['Imagen2'];
    $Imagen3 = $registro['Imagen3'];

    $sentencia = $conexion->prepare("SELECT * FROM productos");
    $sentencia->execute();
}

if ($_POST) {
    #Recogemos los datos del post
    #$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $Nombre = (isset($_POST["Nombre"]) ? $_POST["Nombre"] : "");
    $Descripccion = (isset($_POST["Descripccion"]) ? $_POST["Descripccion"] : "");
    $Familia = (isset($_POST["Familia"]) ? $_POST["Familia"] : "");
    $Precio = (isset($_POST["Precio"]) ? $_POST["Precio"] : "");
    $Imagen1 = (isset($_POST["Imagen1"]) ? $_POST["Imagen1"] : "");
    $Imagen2 = (isset($_POST["Imagen2"]) ? $_POST["Imagen2"] : "");
    $Imagen3 = (isset($_POST["Imagen3"]) ? $_POST["Imagen3"] : "");

    #Preparamos la inserción de los datos
    $sentencia = $conexion->prepare("UPDATE productos SET
    Nombre = :Nombre,
    Descripccion = :Descripccion,
    Familia = :Familia,
    Precio = :Precio,
    Imagen1 = :Imagen1,
    Imagen2 = :Imagen2,
    Imagen3 = :Imagen3
    WHERE idId = :idId");

    # Asignamos parámetros
    $sentencia->bindParam(":Nombre", $Nombre);
    $sentencia->bindParam(":Descripccion", $Descripccion);
    $sentencia->bindParam(":Familia", $Familia);
    $sentencia->bindParam(":Precio", $Precio);
    $sentencia->bindParam(":Imagen1", $Imagen1);
    $sentencia->bindParam(":Imagen2", $Imagen2);
    $sentencia->bindParam(":Imagen3", $Imagen3);
    $sentencia->bindParam(":idId", $txtID);
    $sentencia->execute();

    #Con Imagen, creamos archivo temporal para que al editar, se sustituya el archivo anterior
    $Imagen1 = (isset($_FILES["Imagen1"]['name']) ? $_FILES["Imagen1"]['name'] : "");
    $Imagen2 = (isset($_FILES["Imagen2"]['name']) ? $_FILES["Imagen2"]['name'] : "");
    $Imagen3 = (isset($_FILES["Imagen3"]['name']) ? $_FILES["Imagen3"]['name'] : "");
    $fecha_ = new DateTime();
    $nombreArchivo_Imagen1 = ($Imagen1 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen1"]['name'] : "";
    $nombreArchivo_Imagen2 = ($Imagen2 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen2"]['name'] : "";
    $nombreArchivo_Imagen3 = ($Imagen3 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen3"]['name'] : "";

    $tmp_Imagen1 = $_FILES["Imagen1"]['tmp_name'];
    $tmp_Imagen2 = $_FILES["Imagen2"]['tmp_name'];
    $tmp_Imagen3 = $_FILES["Imagen3"]['tmp_name'];

    if ($tmp_Imagen1 != '') {
        move_uploaded_file($tmp_Imagen1, "./" . $nombreArchivo_Imagen1);

        #Buscamos el archivo relacionado con el id del producto
        $sentencia = $conexion->prepare("SELECT Imagen1 FROM productos WHERE idId=:idId");
        $sentencia->bindParam(":idId", $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        #Si existe el archivo Imagen1, lo borramos
        if (isset($registro_recuperado["Imagen1"]) && $registro_recuperado["Imagen1"] != "") {
            if (file_exists("./" . $registro_recuperado["Imagen1"])) {
                unlink("./" . $registro_recuperado["Imagen1"]);
            }
        }

        #Ejecutamos
        $sentencia = $conexion->prepare("UPDATE productos SET Imagen1 = :Imagen1 WHERE idId = :idId");
        $sentencia->bindParam(":Imagen1", $nombreArchivo_Imagen1);
        $sentencia->bindParam(":idId", $txtID);
        $sentencia->execute();
    }

    if ($tmp_Imagen2 != '') {
        move_uploaded_file($tmp_Imagen2, "./" . $nombreArchivo_Imagen2);

        #Buscamos el archivo relacionado con el id del producto
        $sentencia = $conexion->prepare("SELECT Imagen2 FROM productos WHERE idId=:idId");
        $sentencia->bindParam(":idId", $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        #Si existe el archivo Imagen2, lo borramos
        if (isset($registro_recuperado["Imagen2"]) && $registro_recuperado["Imagen2"] != "") {
            if (file_exists("./" . $registro_recuperado["Imagen2"])) {
                unlink("./" . $registro_recuperado["Imagen2"]);
            }
        }

        #Ejecutamos
        $sentencia = $conexion->prepare("UPDATE productos SET Imagen2 = :Imagen2 WHERE idId = :idId");
        $sentencia->bindParam(":Imagen2", $nombreArchivo_Imagen2);
        $sentencia->bindParam(":idId", $txtID);
        $sentencia->execute();
    }
    
    if ($tmp_Imagen3 != '') {
        move_uploaded_file($tmp_Imagen3, "./" . $nombreArchivo_Imagen3);

        #Buscamos el archivo relacionado con el id del producto
        $sentencia = $conexion->prepare("SELECT Imagen3 FROM productos WHERE idId=:idId");
        $sentencia->bindParam(":idId", $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        #Si existe el archivo FOTO, lo borramos
        if (isset($registro_recuperado["Imagen3"]) && $registro_recuperado["Imagen3"] != "") {
            if (file_exists("./" . $registro_recuperado["Imagen3"])) {
                unlink("./" . $registro_recuperado["Imagen3"]);
            }
        }

        #Ejecutamos
        $sentencia = $conexion->prepare("UPDATE productos SET Imagen3 = :Imagen3 WHERE idId = :idId");
        $sentencia->bindParam(":Imagen3", $nombreArchivo_Imagen3);
        $sentencia->bindParam(":idId", $txtID);
        $sentencia->execute();
    }



    header("Location:index.php");
}
?>



    <h4 class="subtitle">Datos del prodcuto</h4>

    <div class="card-form">
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="line">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" value="<?php echo $Nombre; ?>" class="form-control" name="Nombre" id="Nombre"
                placeholder="Nombre">
            </div>
            
            <div class="line">
                <label for="Descripccion" class="form-label">Descripción</label>
                <input type="text" value="<?php echo $Descripccion; ?>" class="form-control" name="Descripccion"
                id="Descripccion" placeholder="Descripccion">
            </div>
            
            <div class="line">
                <label for="Familia" class="form-label">Categoría</label>
                <input type="text" value="<?php echo $Familia; ?>" class="form-control" name="Familia" id="Familia"
                placeholder="Familia">
            </div>
            
            <div class="line">
                <label for="Precio" class="form-label">Precio</label>
                <input type="text" value="<?php echo $Precio; ?>" class="form-control" name="Precio" id="Precio"
                placeholder="Precio">
            </div>
            
            <div class="line">
                <label for="Imagen1" class="form-label">Imagen 1</label>
                <input type="file" class="form-control" name="Imagen1" id="Imagen1" placeholder="Imagen1">
            </div>
            
            <div class="line">
                <label for="Imagen2" class="form-label">Imagen 2</label>
                <input type="file" class="form-control" name="Imagen2" id="Imagen2" placeholder="Imagen2">
            </div>

            <div class="line">
                <label for="Imagen3" class="form-label">Imagen 3</label>
                <input type="file" class="form-control" name="Imagen3" id="Imagen3" placeholder="Imagen3">
            </div>

            <button type="submit" class="btn-success">Actualizar</button>
            <a href="index.php" class="btn-danger">Cancelar</a>
        </form>
    </div>
    
    <?php include('../../templates/footer.php'); ?>