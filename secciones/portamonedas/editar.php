<?php
include ("../../bd.php");
?>

<?php

$txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

if (isset($_GET['txtID'])) {

    $sentencia = $conexion->prepare("SELECT * FROM portamonedas WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $registro['nombre'];
    $foto = $registro['foto'];
    $procesador = $registro['medidas'];
    $memoria = $registro['conexiones'];
    $disco = $registro['billetera'];
    $pantalla = $registro['monedero'];
    $pantalla = $registro['profundidad'];
    $pantalla = $registro['anchura'];
    $pantalla = $registro['altura'];

    $sentencia = $conexion->prepare("SELECT * FROM portamonedas");
    $sentencia->execute();
}

if ($_POST) {
    #Recogemos los datos del post
    #$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $procesador = (isset($_POST["medidas"]) ? $_POST["medidas"] : "");
    $memoria = (isset($_POST["conexiones"]) ? $_POST["conexiones"] : "");
    $disco = (isset($_POST["billetera"]) ? $_POST["billetera"] : "");
    $pantalla = (isset($_POST["monedero"]) ? $_POST["monedero"] : "");
    $pantalla = (isset($_POST["profundidad"]) ? $_POST["profundidad"] : "");
    $pantalla = (isset($_POST["anchura"]) ? $_POST["anchura"] : "");
    $pantalla = (isset($_POST["altura"]) ? $_POST["altura"] : "");

    #Preparamos la inserción de los datos
    $sentencia = $conexion->prepare("UPDATE portamonedas SET
    nombre = :nombre,
    medidas = :medidas,
    conexiones = :conexiones,
    billetera = :billetera,
    monedero = :monedero,
    profundidad = :profundidad,
    anchura = :anchura,
    altura = :altura
    WHERE id = :id");

    # Asignamos parámetros
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":medidas", $medidas);
    $sentencia->bindParam(":conexiones", $conexiones);
    $sentencia->bindParam(":billetera", $billetera);
    $sentencia->bindParam(":monedero", $monedero);
    $sentencia->bindParam(":profundidad", $profundidad);
    $sentencia->bindParam(":anchura", $anchura);
    $sentencia->bindParam(":altura", $altura);
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
        $sentencia = $conexion->prepare("SELECT foto FROM portamonedas WHERE id=:id");
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
        $sentencia = $conexion->prepare("UPDATE portamonedas SET foto = :foto WHERE id = :id");
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
    <title>Crear portamonedas</title>
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

    <h4 class="subtitle">Datos del portamonedas</h4>

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
                <label for="medidas" class="form-label">Medidas</label>
                <input type="text" value="<?php echo $medidas; ?>" class="form-control" name="medidas"
                    id="medidas" placeholder="Medidas">
            </div>

            <div class="line">
                <label for="conexiones" class="form-label">Conexiones</label>
                <input type="text" value="<?php echo $conexiones; ?>" class="form-control" name="conexiones" id="conexiones"
                    placeholder="Conexiones">
            </div>

            <div class="line">
                <label for="billetera" class="form-label">Billetera</label>
                <input type="text" value="<?php echo $billetera; ?>" class="form-control" name="billetera" id="billetera"
                    placeholder="Billetera">
            </div>

            <div class="line">
                <label for="monedero" class="form-label">Monedero</label>
                <input type="text" value="<?php echo $monedero; ?>" class="form-control" name="monedero" id="monedero"
                    placeholder="Monedero">
            </div>

            <div class="line">
                <label for="profundidad" class="form-label">Profundidad</label>
                <input type="text" value="<?php echo $profundidad; ?>" class="form-control" name="profundidad" id="profundidad"
                    placeholder="Profundidad">
            </div>

            <div class="line">
                <label for="anchura" class="form-label">Anchura</label>
                <input type="text" value="<?php echo $anchura; ?>" class="form-control" name="anchura" id="anchura"
                    placeholder="Anchura">
            </div>

            <div class="line">
                <label for="altura" class="form-label">Altura</label>
                <input type="text" value="<?php echo $altura; ?>" class="form-control" name="altura" id="altura"
                    placeholder="Altura">
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