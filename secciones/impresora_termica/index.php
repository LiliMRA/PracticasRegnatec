<?php
include ('../../bd.php');

$url_base = "http://localhost:3000/";
?>

<?php
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //Buscamos el archivo relacionado con el monitor
    $sentencia = $conexion->prepare("SELECT foto FROM impresora_termica WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    //Si existe el archivo FOTO, lo borramos
    if (isset($registro_recuperado["foto"]) && $registro_recuperado["foto"] != "") {
        if (file_exists("./" . $registro_recuperado["foto"])) {
            unlink("./" . $registro_recuperado["foto"]);
        }
    }


    #Sentencia para eliminar un registro

    $sentencia = $conexion->prepare("DELETE FROM impresora_termica WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");
}


#Llamamos tabla de BBDD

$sentencia = $conexion->prepare("SELECT * FROM impresora_termica");
$sentencia->execute();
$lista_impresora_termica = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore</title>
    <link rel="icon" href="../../img/logotipo.png">
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="index.css">
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
                        <a href="<?php echo $url_base; ?>../../index.html">Inicio</a>
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

    <h4>Impresiras térmicas</h4>

    <section>
        <div class="card-table">
            <div class="card-header">
                <a href="crear.php" class="btn-primary">
                    Añadir impresora térmica
                </a>
            </div>

            <div class="card-body">
                <div class="main-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Peso</th>
                                <th>Dimensiones</th>
                                <th>Alimentación</th>
                                <th>Resolución</th>
                                <th>Velocidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($lista_impresora_termica as $registro) {
                                ?>
                                <tr>
                                    <td> <?php echo $registro['id']; ?> </td>
                                    <td> <?php echo $registro['nombre']; ?> </td>
                                    <td> 
                                        <img width="50" src="<?php echo $registro['foto']; ?>" alt="Imagen-producto">
                                    </td>
                                    <td> <?php echo $registro['peso']; ?> </td>
                                    <td> <?php echo $registro['dimensiones']; ?> </td>
                                    <td> <?php echo $registro['alimentacion']; ?> </td>
                                    <td> <?php echo $registro['resolucion']; ?> </td>
                                    <td> <?php echo $registro['velocidad']; ?> </td>
                                    <td>
                                        <a class="btn-info"
                                            href="editar.php?txtID=<?php echo $registro['id']; ?>">Editar</a>
                                        <a class="btn-danger"
                                            href="index.php?txtID=<?php echo $registro['id']; ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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