<?php
include ('../../bd.php');
?>

<?php

if ($_POST) {
    # Recogemos los datos del $_POST
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $procesador = (isset($_POST["procesador"]) ? $_POST["procesador"] : "");
    $memoria = (isset($_POST["memoria"]) ? $_POST["memoria"] : "");
    $disco = (isset($_POST["disco"]) ? $_POST["disco"] : "");
    $pantalla = (isset($POST["pantalla"]) ? $_POST["pantalla"] : "");
    
    $foto = (isset($_FILES["foto"]) ? $_FILES["foto"] : "");

    # Insertamos los datos
    $sentencia = $conexion->prepare("INSERT INTO monitores
(id, foto, nombre, procesador, memoria, disco, pantalla) VALUES
(NULL, :foto, :nombre, :procesador, :memoria, :disco, :pantalla);");

    # Asignamos los valores
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":procesador", $procesador);
    $sentencia->bindParam(":memoria", $memoria);
    $sentencia->bindParam(":disco", $disco);
    $sentencia->bindParam(":pantalla", $pantalla);

    # Adjuntamos foto
    $fecha_ = new DateTime();

    $nombreArchivo_foto = ($foto != '') ? $fecha_->getTimestamp() . "_" . $_FILES["foto"]['name'] : "";
    $tmp_foto = $_FILES["foto"]['name'];

    if ($tmp_foto != '') {
        move_uploaded_file($tmp_foto, "./" . $nombreArchivo_foto);
    }

    $sentencia->bindParam(":foto", $nombreArchivo_foto);

    # Ejecutamos

    $sentencia->execute();
    header("Location:index.php");
    die();
}

?>

<h4>Datos del monitor</h4>

<div class="card-form">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="line">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
        </div>

        <div class="line">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
        </div>

        <div class="line">
            <label for="procesador" class="form-label">Procesador</label>
            <input type="text" class="form-control" name="procesador" id="procesador" placeholder="Procesador">
        </div>

        <div class="line">
            <label for="memoria" class="form-label">Memoria</label>
            <input type="text" class="form-control" name="memoria" id="memoria" placeholder="Memoria">
        </div>

        <div class="line">
            <label for="disco" class="form-label">Disco</label>
            <input type="text" class="form-control" name="disco" id="disco" placeholder="Disco">
        </div>

        <div class="line">
            <label for="pantalla" class="form-label">Pantalla</label>
            <input type="text" class="form-control" name="pantalla" id="pantalla" placeholder="Pantalla">
        </div>

        <button type="submit" class="btn-success">Agregar registro</button>
        <a href="index.php" class="btn-danger">Cancelar</a>
    </form>
</div>