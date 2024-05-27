<?php
include ("../../bd.php");
?>

<?php

if (isset ($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM monitores WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $nombre = $registro['nombre'];
    $foto = $registro['foto'];
    $procesador = $registro['procesador'];
    $memoria = $registro['memoria'];
    $disco = $registro['disco'];
    $pantalla = $registro['pantalla'];

    $sentencia = $conexion->prepare("SELECT * FROM monitores");
    $sentencia->execute();
}

if ($_POST) {

    #Recogemos los datos del post
    $txtID = (isset($_POST['txtID']))
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear monitor</title>
    <link rel="stylesheet" href="crear.css">
</head>

<body>
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
</body>

</html>