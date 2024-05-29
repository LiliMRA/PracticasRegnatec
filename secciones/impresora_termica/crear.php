<?php
include ('../../bd.php');
?>

<?php

if ($_POST) {
    # Recogemos los datos del $_POST
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $procesador = (isset($_POST["peso"]) ? $_POST["peso"] : "");
    $memoria = (isset($_POST["dimensiones"]) ? $_POST["dimensiones"] : "");
    $disco = (isset($_POST["alimentacion"]) ? $_POST["alimentacion"] : "");
    $pantalla = (isset($POST["resolucion"]) ? $_POST["resolucion"] : "");
    $pantalla = (isset($POST["velocidad"]) ? $_POST["velocidad"] : "");

    $foto = (isset($_FILES["foto"]['name']) ? $_FILES["foto"]['name'] : "");

    # Insertamos los datos
    $sentencia = $conexion->prepare("INSERT INTO imprsora_termica
(id, foto, nombre, peso, dimensiones, alimentacion, resolucion, velocidad) VALUES
(NULL, :foto, :nombre, :peso, :dimensiones, :alimentacion, :resolucion, :velocidad);");

    # Asignamos los valores
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":peso", $peso);
    $sentencia->bindParam(":dimensiones", $dimensiones);
    $sentencia->bindParam(":alimentacion", $alimentacion);
    $sentencia->bindParam(":resolucion", $resolucion);
    $sentencia->bindParam(":velocidad", $velocidad);

    # Adjuntamos foto
    $fecha_ = new DateTime();

    $nombreArchivo_foto = ($foto != '') ? $fecha_->getTimestamp() . "_" . $_FILES["foto"]['name'] : "";
    $tmp_foto = $_FILES["foto"]['tmp_name'];

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear escaner</title>
    <link rel="icon" href="../../img/logotipo.png">
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="crear.css">
</head>

<body>

    <header>
        <div class="wrap">
            <div class="logotipo" id="logotipo">
                <a href="../../index.html">
                    <img src="../../img/logotipo.png" alt="logotipo">
                </a>
            </div>

            <nav class="nav">
                <ul class="menu">
                    <li>
                        <a href="../../index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="../../tienda.php">Tienda</a>
                    </li>
                    <li>
                        <a href="../../contacto.html">Contacto</a>
                    </li>
                    <li>
                        <a href="../../llamar.php">Te llamamos</a>
                    </li>
                    <li>
                        <a href="#" id="login">
                            <img class="social-icon" src="../../img/user.png" alt="Icono-social">
                            Inicia sesión
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <h4 class="subtitle">Datos del escaner</h4>

    <div class="card-form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="line">
                <label for="foto" class="form-label">Foto</label>
                <br>
                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
            </div>

            <div class="line">
                <label for="nombre" class="form-label">Nombre</label>
                <br>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
            </div>

            <div class="line">
                <label for="peso" class="form-label">Peso</label>
                <br>
                <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso">
            </div>

            <div class="line">
                <label for="dimensiones" class="form-label">Dimensiones</label>
                <br>
                <input type="text" class="form-control" name="dimensiones" id="dimensiones" placeholder="Dimensiones">
            </div>

            <div class="line">
                <label for="alimentacion" class="form-label">Alimentación</label>
                <br>
                <input type="text" class="form-control" name="alimentacion" id="alimentacion" placeholder="Alimentación">
            </div>

            <div class="line">
                <label for="resolucion" class="form-label">Resolución</label>
                <br>
                <input type="text" class="form-control" name="resolucion" id="resolucion" placeholder="Resolución">
            </div>

            <div class="line">
                <label for="velocidad" class="form-label">Velocidad</label>
                <br>
                <input type="text" class="form-control" name="velocidad" id="velocidad" placeholder="Velocidad">
            </div>

            <button type="submit" class="btn-success">Agregar registro</button>
            <a href="index.php" class="btn-danger">Cancelar</a>
        </form>
    </div>
</body>

<footer>
    <div class="apart">
        <ul>
            <li><a href="#">Loren ipsum</a></li>
            <li><a href="#">Loren ipsum</a></li>
            <li><a href="#">Loren ipsum</a></li>
            <li><a href="#">Loren ipsum</a></li>
        </ul>
    </div>

    <div class="social-media">
        <ul>
            <li>Social</li>
            <li>Social</li>
            <li>Social</li>
        </ul>
    </div>
</footer>

</html>