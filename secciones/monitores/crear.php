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

    $foto = (isset($_FILES["foto"]['name']) ? $_FILES["foto"]['name'] : "");

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
    <title>Crear monitor</title>
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
                        <a href="#">Contacto</a>
                    </li>
                    <li>
                        <a href="#">Te llamamos</a>
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

    <h4 class="subtitle">Datos del monitor</h4>

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
                <label for="procesador" class="form-label">Procesador</label>
                <br>
                <input type="text" class="form-control" name="procesador" id="procesador" placeholder="Procesador">
            </div>

            <div class="line">
                <label for="memoria" class="form-label">Memoria</label>
                <br>
                <input type="text" class="form-control" name="memoria" id="memoria" placeholder="Memoria">
            </div>

            <div class="line">
                <label for="disco" class="form-label">Disco</label>
                <br>
                <input type="text" class="form-control" name="disco" id="disco" placeholder="Disco">
            </div>

            <div class="line">
                <label for="pantalla" class="form-label">Pantalla</label>
                <br>
                <input type="text" class="form-control" name="pantalla" id="pantalla" placeholder="Pantalla">
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