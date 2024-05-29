<?php
include ('../../bd.php');
?>

<?php

if ($_POST) {
    # Recogemos los datos del $_POST
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $procesador = (isset($_POST["lectura"]) ? $_POST["lectura"] : "");
    $memoria = (isset($_POST["uso"]) ? $_POST["uso"] : "");
    $disco = (isset($_POST["escaneado"]) ? $_POST["escaneado"] : "");
    $pantalla = (isset($POST["interface"]) ? $_POST["interface"] : "");
    $pantalla = (isset($POST["tecnologia"]) ? $_POST["tecnologia"] : "");
    $pantalla = (isset($POST["soporte"]) ? $_POST["soporte"] : "");

    $foto = (isset($_FILES["foto"]['name']) ? $_FILES["foto"]['name'] : "");

    # Insertamos los datos
    $sentencia = $conexion->prepare("INSERT INTO escaner
(id, foto, lectura, uso, escaneado, interface, tecnologia, soporte) VALUES
(NULL, :foto, :lectura, :uso, :escaneado, :interface, :tecnologia, :soporte);");

    # Asignamos los valores
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":lectura", $lectura);
    $sentencia->bindParam(":uso", $uso);
    $sentencia->bindParam(":escaneado", $escaneado);
    $sentencia->bindParam(":interface", $interface);
    $sentencia->bindParam(":tecnologia", $tecnologia);
    $sentencia->bindParam(":soporte", $soporte);

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

    <h4 class="subtitle">Datos del ecaner</h4>

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
                <label for="lectura" class="form-label">Lectura</label>
                <br>
                <input type="text" class="form-control" name="lectura" id="lectura" placeholder="Lectura">
            </div>

            <div class="line">
                <label for="uso" class="form-label">Uso</label>
                <br>
                <input type="text" class="form-control" name="uso" id="uso" placeholder="Uso">
            </div>

            <div class="line">
                <label for="escaneado" class="form-label">Escaneado</label>
                <br>
                <input type="text" class="form-control" name="escaneado" id="escaneado" placeholder="Escaneado">
            </div>

            <div class="line">
                <label for="interface" class="form-label">Interface</label>
                <br>
                <input type="text" class="form-control" name="interface" id="interface" placeholder="Interface">
            </div>

            <div class="line">
                <label for="tecnologia" class="form-label">Tecnologia</label>
                <br>
                <input type="text" class="form-control" name="tecnologia" id="tecnologia" placeholder="Tecnologia">
            </div>

            <div class="line">
                <label for="soporte" class="form-label">soporte</label>
                <br>
                <input type="soporte" class="form-control" name="soporte" id="soporte" placeholder="soporte">
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