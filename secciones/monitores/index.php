<?php
include ('../../bd.php');
?>

<?php
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //Buscamos el archivo relacionado con el monitor
    $sentencia = $conexion->prepare("SELECT foto FROM monitores WHERE id=:id");
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
    if (isset($_GET['txtID'])) {
        $txtID = (isset($_GET['$txtID'])) ? $_GET['txtID'] : "";

        $sentencia = $conexion->prepare("DELETE FROM monitores WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        header("Location:index.php");
    }
}

#Llamamos tabla de BBDD

$sentencia = $conexion->prepare("SELECT * FROM monitores");
$sentencia->execute();
$lista_monitores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore</title>
    <link rel="icon" href="img\logotipo.png">
    <link rel="stylesheet" href="../../index.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <header>
        <div class="wrap">
            <div class="logotipo" id="logotipo">
                <a href="index.html">
                    <img src="img/logotipo.png" alt="logotipo">
                </a>
            </div>

            <nav class="nav">
                <ul class="menu">
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="tienda.php">Tienda</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                    <li>
                        <a href="#">Te llamamos</a>
                    </li>
                    <li>
                        <a href="#" id="login">
                            <img class="social-icon" src="img/user.png" alt="Icono-social">
                            Inicia sesión
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <h4>Monitores</h4>
    <section>
        <div class="card-table">
            <div class="card-header">
                <a href="crear.php" class="btn-primary">
                    Añadir monitor
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
                                <th>Procesador</th>
                                <th>Memoria</th>
                                <th>Disco</th>
                                <th>Pantalla</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($lista_monitores as $registro) {
                                ?>
                                <tr>
                                    <td> <?php echo $registro['id']; ?> </td>
                                    <td> <?php echo $registro['nombre']; ?> </td>
                                    <td> <?php echo $registro['foto']; ?> </td>
                                    <td> <?php echo $registro['procesador']; ?> </td>
                                    <td> <?php echo $registro['memoria']; ?> </td>
                                    <td> <?php echo $registro['disco']; ?> </td>
                                    <td> <?php echo $registro['pantalla']; ?> </td>
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