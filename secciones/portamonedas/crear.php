<?php
include ('../../bd.php');
?>

<?php

if ($_POST) {
    # Recogemos los datos del $_POST
    $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
    $procesador = (isset($_POST["medidas"]) ? $_POST["medidas"] : "");
    $memoria = (isset($_POST["conexiones"]) ? $_POST["conexiones"] : "");
    $disco = (isset($_POST["billetera"]) ? $_POST["billetera"] : "");
    $pantalla = (isset($POST["monedero"]) ? $_POST["monedero"] : "");
    $pantalla = (isset($POST["profundidad"]) ? $_POST["profundidad"] : "");
    $pantalla = (isset($POST["anchura"]) ? $_POST["anchura"] : "");
    $pantalla = (isset($POST["altura"]) ? $_POST["altura"] : "");

    $foto = (isset($_FILES["foto"]['name']) ? $_FILES["foto"]['name'] : "");

    # Insertamos los datos
    $sentencia = $conexion->prepare("INSERT INTO portamonedas
(id, foto, nombre, medidas, conexiones, billetera, monedero, profundidad, anchura, altura) VALUES
(NULL, :foto, :nombre, :medidas, :conexiones, :billetera, :monedero, :profundidad, :anchura, :altura);");

    # Asignamos los valores
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":medidas", $medidas);
    $sentencia->bindParam(":conexiones", $conexiones);
    $sentencia->bindParam(":billetera", $billetera);
    $sentencia->bindParam(":monedero", $monedero);
    $sentencia->bindParam(":profundidad", $profundidad);
    $sentencia->bindParam(":anchura", $anchura);
    $sentencia->bindParam(":altura", $altura);

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
    <title>Crear portamonedas</title>
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

    <h4 class="subtitle">Datos del portamonedas</h4>

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
                <label for="medidas" class="form-label">Medidas</label>
                <br>
                <input type="text" class="form-control" name="medidas" id="medidas" placeholder="Medidas">
            </div>

            <div class="line">
                <label for="conexiones" class="form-label">Conexiones</label>
                <br>
                <input type="text" class="form-control" name="conexiones" id="conexiones" placeholder="Conexiones">
            </div>

            <div class="line">
                <label for="billetera" class="form-label">Billetera</label>
                <br>
                <input type="text" class="form-control" name="billetera" id="billetera" placeholder="Billetera">
            </div>

            <div class="line">
                <label for="monedero" class="form-label">Monedero</label>
                <br>
                <input type="text" class="form-control" name="monedero" id="monedero" placeholder="Monedero">
            </div>

            <div class="line">
                <label for="profundidad" class="form-label">Profundidad</label>
                <br>
                <input type="text" class="form-control" name="profundidad" id="profundidad" placeholder="Profundidad">
            </div>

            <div class="line">
                <label for="anchura" class="form-label">Anchura</label>
                <br>
                <input type="text" class="form-control" name="anchura" id="anchura" placeholder="Anchura">
            </div>

            <div class="line">
                <label for="altura" class="form-label">Altura</label>
                <br>
                <input type="text" class="form-control" name="altura" id="altura" placeholder="Altura">
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