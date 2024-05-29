<?php
include ("../../bd.php");
?>

<?php

$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

if (isset($_GET['txtID'])) {

    $sentencia = $conexion->prepare("SELECT * FROM escaner WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $registro['nombre'];
    $foto = $registro['foto'];
    $lectura = $registro['lectura'];
    $uso = $registro['uso'];
    $escaneado = $registro['escaneado'];
    $interface = $registro['interface'];
    $tecnologia = $registro['tecnologia'];
    $soporte = $registro['soporte'];

    $sentencia = $conexion->prepare("SELECT * FROM escaner");
    $sentencia->execute();
}

if ($_POST) {
    #Recogemos los datos del post
    #$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $procesador = (isset($_POST["lectura"]) ? $_POST["lectura"] : "");
    $memoria = (isset($_POST["uso"]) ? $_POST["uso"] : "");
    $disco = (isset($_POST["escaneado"]) ? $_POST["escaneado"] : "");
    $pantalla = (isset($_POST["interface"]) ? $_POST["interface"] : "");
    $pantalla = (isset($_POST["tecnologia"]) ? $_POST["tecnologia"] : "");
    $pantalla = (isset($_POST["soporte"]) ? $_POST["soporte"] : "");

    #Preparamos la inserción de los datos
    $sentencia = $conexion->prepare("UPDATE escaner SET
    nombre = :nombre,
    lectura = :lectura,
    uso = :uso,
    escaneado = :escaneado,
    interface = :interface,
    tecnologia = :tecnologia,
    soporte = :soporte
    WHERE id = :id");

    # Asignamos parámetros
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":lectura", $lectura);
    $sentencia->bindParam(":uso", $uso);
    $sentencia->bindParam(":escaneado", $escaneado);
    $sentencia->bindParam(":interface", $interface);
    $sentencia->bindParam(":tecnologia", $tecnologia);
    $sentencia->bindParam(":soporte", $soporte);
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

    #Con Foto, creamos archivo temporal para que al editar, se sustituya el archivo anterior
    $foto = (isset($_FILES["foto"]['name']) ? $_FILES["foto"]['name'] : "");
    $fecha_ = new DateTime();
    $nombreArchivo_foto = ($foto != '') ? $fecha_->getTimestamp() . "_" . $_FILES["foto"]['name'] : "";

    $tmp_foto = $_FILES["foto"]['tmp_name'];

    if ($tmp_foto != '') {
        move_uploaded_file($tmp_foto, "./" . $nombreArchivo_foto);

        #Buscamos el archivo relacionado con el id del producto
        $sentencia = $conexion->prepare("SELECT foto FROM escaner WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

        #Si existe el archivo FOTO, lo borramos
        if (isset($registro_recuperado["foto"]) && $registro_recuperado["foto"] != "") {
            if (file_exists("./" . $registro_recuperado["foto"])) {
                unlink("./" . $registro_recuperado["foto"]);
            }
        }

        #Ejecutamos
        $sentencia = $conexion->prepare("UPDATE escaner SET foto = :foto WHERE id = :id");
        $sentencia->bindParam(":foto", $nombreArchivo_foto);
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
    }

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear escaner</title>
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
                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
            </div>

            <div class="line">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre"
                    placeholder="Nombre">
            </div>

            <div class="line">
                <label for="lectura" class="form-label">Lectura</label>
                <input type="text" value="<?php echo $lectura; ?>" class="form-control" name="lectura"
                    id="lectura" placeholder="Lectura">
            </div>

            <div class="line">
                <label for="uso" class="form-label">Uso</label>
                <input type="text" value="<?php echo $uso; ?>" class="form-control" name="uso" id="uso"
                    placeholder="Uso">
            </div>

            <div class="line">
                <label for="escaneado" class="form-label">Escaneado</label>
                <input type="text" value="<?php echo $escaneado; ?>" class="form-control" name="escaneado" id="escaneado"
                    placeholder="Escaneado">
            </div>

            <div class="line">
                <label for="interface" class="form-label">Interface</label>
                <input type="text" value="<?php echo $interface; ?>" class="form-control" name="interface" id="interface"
                    placeholder="Interface">
            </div>

            <div class="line">
                <label for="tecnologia" class="form-label">Tecnología</label>
                <input type="text" value="<?php echo $tecnologia; ?>" class="form-control" name="tecnologia" id="tecnologia"
                    placeholder="Tecnología">
            </div>

            <div class="line">
                <label for="soporte" class="form-label">Soporte</label>
                <input type="text" value="<?php echo $soporte; ?>" class="form-control" name="soporte" id="soporte"
                    placeholder="Soporte">
            </div>

            <button type="submit" class="btn-success">Actualizar</button>
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