<?php
include ("../../bd.php");
?>

<?php

$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

if (isset($_GET['txtID'])) {

    $sentencia = $conexion->prepare("SELECT * FROM impresora_termica WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $registro['nombre'];
    $foto = $registro['foto'];
    $peso = $registro['peso'];
    $dimensiones = $registro['dimensiones'];
    $alimentacion = $registro['alimentacion'];
    $resolucion = $registro['resolucion'];
    $velocidad = $registro['velocidad'];

    $sentencia = $conexion->prepare("SELECT * FROM impresora_termica");
    $sentencia->execute();
}

if ($_POST) {
    #Recogemos los datos del post
    #$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $peso = (isset($_POST["peso"]) ? $_POST["peso"] : "");
    $dimensiones = (isset($_POST["dimensiones"]) ? $_POST["dimensiones"] : "");
    $alimentacion = (isset($_POST["alimentacion"]) ? $_POST["alimentacion"] : "");
    $resolucion = (isset($_POST["resolucion"]) ? $_POST["resolucion"] : "");
    $velocidad = (isset($_POST["velocidad"]) ? $_POST["velocidad"] : "");

    #Preparamos la inserción de los datos
    $sentencia = $conexion->prepare("UPDATE impresora_termica SET
    nombre = :nombre,
    peso = :peso,
    dimensiones = :dimensiones,
    alimentacion = :alimentacion,
    resolucion = :resolucion,
    velocidad = :velocidad
    WHERE id = :id");

    # Asignamos parámetros
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":peso", $peso);
    $sentencia->bindParam(":dimensiones", $dimensiones);
    $sentencia->bindParam(":alimentacion", $alimentacion);
    $sentencia->bindParam(":resolucion", $resolucion);
    $sentencia->bindParam(":velocidad", $velocidad);
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
        $sentencia = $conexion->prepare("SELECT foto FROM impresora_termica WHERE id=:id");
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
        $sentencia = $conexion->prepare("UPDATE impresora_termica SET foto = :foto WHERE id = :id");
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
    <title>Crear monitor</title>
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
                <label for="peso" class="form-label">Peso</label>
                <input type="text" value="<?php echo $peso; ?>" class="form-control" name="peso"
                    id="peso" placeholder="Peso">
            </div>

            <div class="line">
                <label for="dimensiones" class="form-label">Dimensiones</label>
                <input type="text" value="<?php echo $dimensiones; ?>" class="form-control" name="dimensiones" id="dimensiones"
                    placeholder="Dimensiones">
            </div>

            <div class="line">
                <label for="alimentacion" class="form-label">Alimentacion</label>
                <input type="text" value="<?php echo $alimentacion; ?>" class="form-control" name="alimentacion" id="alimentacion"
                    placeholder="Alimentacion">
            </div>

            <div class="line">
                <label for="resolucion" class="form-label">Resolucion</label>
                <input type="text" value="<?php echo $resolucion; ?>" class="form-control" name="resolucion" id="resolucion"
                    placeholder="Resolucion">
            </div>

            <div class="line">
                <label for="velocidad" class="form-label">Velocidad</label>
                <input type="text" value="<?php echo $velocidad; ?>" class="form-control" name="velocidad" id="velocidad"
                    placeholder="Velocidad">
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