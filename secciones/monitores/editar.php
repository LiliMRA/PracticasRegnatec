<?php
include ("../../bd.php");
?>

<?php

$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

if (isset($_GET['txtID'])) {

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
    #$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $procesador = (isset($_POST["procesador"]) ? $_POST["procesador"] : "");
    $memoria = (isset($_POST["memoria"]) ? $_POST["memoria"] : "");
    $disco = (isset($_POST["disco"]) ? $_POST["disco"] : "");
    $pantalla = (isset($_POST["pantalla"]) ? $_POST["pantalla"] : "");

    #Preparamos la inserción de los datos
    $sentencia = $conexion->prepare("UPDATE monitores SET
    nombre = :nombre,
    procesador = :procesador,
    memoria = :memoria,
    disco = :disco,
    pantalla = :pantalla
    WHERE id = :id");

    # Asignamos parámetros
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":procesador", $procesador);
    $sentencia->bindParam(":memoria", $memoria);
    $sentencia->bindParam(":disco", $disco);
    $sentencia->bindParam(":pantalla", $pantalla);
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
        $sentencia = $conexion->prepare("SELECT foto FROM monitores WHERE id=:id");
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
        $sentencia = $conexion->prepare("UPDATE monitores SET foto = :foto WHERE id = :id");
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

    <h4 class="subtitle">Datos del monitor</h4>

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
                <label for="procesador" class="form-label">Procesador</label>
                <input type="text" value="<?php echo $procesador; ?>" class="form-control" name="procesador"
                    id="procesador" placeholder="Procesador">
            </div>

            <div class="line">
                <label for="memoria" class="form-label">Memoria</label>
                <input type="text" value="<?php echo $memoria; ?>" class="form-control" name="memoria" id="memoria"
                    placeholder="Memoria">
            </div>

            <div class="line">
                <label for="disco" class="form-label">Disco</label>
                <input type="text" value="<?php echo $disco; ?>" class="form-control" name="disco" id="disco"
                    placeholder="Disco">
            </div>

            <div class="line">
                <label for="pantalla" class="form-label">Pantalla</label>
                <input type="text" value="<?php echo $pantalla; ?>" class="form-control" name="pantalla" id="pantalla"
                    placeholder="Pantalla">
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