<?php include('../bd.php');

#$url_base = "http://localhost:3000/"; ?>

<?php
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //Buscamos la imagen relacionado con el producto
    $sentencia = $conexion->prepare("SELECT Imagen1 FROM productos WHERE idId=:idId");
    $sentencia = $conexion->prepare("SELECT Imagen2 FROM productos WHERE idId=:idId");
    $sentencia = $conexion->prepare("SELECT Imagen3 FROM productos WHERE idId=:idId");
    $sentencia->bindParam(":idId", $txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    //Si existe el archivo Imagen1, lo borramos
    if (isset($registro_recuperado["Imagen1"]) && $registro_recuperado["Imagen1"] != "") {
        if (file_exists("./" . $registro_recuperado["Imagen1"])) {
            unlink("./" . $registro_recuperado["Imagen1"]);
        }
    }

    if (isset($registro_recuperado["Imagen2"]) && $registro_recuperado["Imagen2"] != "") {
        if (file_exists("./" . $registro_recuperado["Imagen2"])) {
            unlink("./" . $registro_recuperado["Imagen2"]);
        }
    }

    if (isset($registro_recuperado["Imagen3"]) && $registro_recuperado["Imagen3"] != "") {
        if (file_exists("./" . $registro_recuperado["Imagen3"])) {
            unlink("./" . $registro_recuperado["Imagen3"]);
        }
    }


    #Sentencia para eliminar un registro

    $sentencia = $conexion->prepare("DELETE FROM productos WHERE idId=:idId");
    $sentencia->bindParam(":idId", $txtID);
    $sentencia->execute();
    header("Location:index.php");
}

#Llamamos tabla de BBDD

$sentencia = $conexion->prepare("SELECT * FROM productos");
$sentencia->execute();
$lista_productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore - Hardware</title>
    <link rel="icon" href="../img/logotipo.png">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        <div class="wrap">
            <div class="logotipo" id="logotipo">
                <a href="../index.html">
                    <img src="../img/logotipo.png" alt="logotipo">
                </a>
            </div>

            <nav class="nav">
                <ul class="menu">
                    <li>
                        <a href="../index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="../tienda.php">Tienda</a>
                    </li>
                    <li>
                        <a href="../contacto.html">Contacto</a>
                    </li>
                    <li>
                        <a href="../llamar.php">Te llamamos</a>
                    </li>
                    <li>
                        <a href="#" id="login">
                            <img class="social-icon" src="../img/user.png" alt="Icono-social">
                            Inicia sesión
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="second-menu">
        <div class="second-nav">
            <ul class="second-menu">
                <li><a href="../escaner/index.php" class="btn-secondMenu">Escaner</a></li>
                <li><a href="../impresora_termica/index.php" class="btn-secondMenu">Impresoras térmicas</a></li>
                <li><a href="../monitores/index.php" class="btn-secondMenu">Monitores</a></li>
                <li><a href="../portamonedas/index.php" class="btn-secondMenu">Portamonedas</a></li>
            </ul>
        </div>
    </div>

    <h4>Hardware</h4>

    <section>
        <div class="card-table">
            <div class="card-header">
                <a href="crear.php" class="btn-primary">
                    Añadir producto
                </a>
            </div>

            <div class="card-body">
                <div class="main-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Imagen 1</th>
                                <th>Imagen 2</th>
                                <th>Imagen 3</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($lista_productos as $registro) {
                            ?>
                                <tr>
                                    <td> <?php echo $registro['idId']; ?> </td>
                                    <td> <?php echo $registro['Nombre']; ?> </td>
                                    <td> <?php echo $registro['Descripccion']; ?> </td>
                                    <td> <?php echo $registro['Familia']; ?> </td>
                                    <td> <?php echo $registro['Precio']; ?> </td>
                                    <td>
                                        <img width="50" src="<?php echo $registro['Imagen1']; ?>" alt="Imagen-producto1">
                                    <td>
                                        <img width="50" src="<?php echo $registro['Imagen2']; ?>" alt="Imagen-producto2">
                                    </td>
                                    <td>
                                        <img width="50" src="<?php echo $registro['Imagen3']; ?>" alt="Imagen-producto3">
                                    </td>
                                    <td>
                                        <a class="btn-info" href="editar.php?txtID=<?php echo $registro['idId']; ?>">Editar</a>
                                        <a class="btn-danger" href="index.php?txtID=<?php echo $registro['idId']; ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

</body>

</html>