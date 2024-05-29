<?php
include ('../../bd.php');

$url_base = "http://localhost:3000/";
?>

<?php
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //Buscamos el archivo relacionado con el portamonedas
    $sentencia = $conexion->prepare("SELECT foto FROM portamonedas WHERE id=:id");
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

    $sentencia = $conexion->prepare("DELETE FROM portamonedas WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");
}


#Llamamos tabla de BBDD

$sentencia = $conexion->prepare("SELECT * FROM portamonedas");
$sentencia->execute();
$lista_portamonedas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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

    <h4>Portamonedas</h4>
    <section>
        <div class="card-table">
            <div class="card-header">
                <a href="crear.php" class="btn-primary">
                    Añadir portamonedas
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
                                <th>Medidas</th>
                                <th>Conexiones</th>
                                <th>Billetera</th>
                                <th>Monedero</th>
                                <th>Profundidad</th>
                                <th>Anchura</th>
                                <th>Altura</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($lista_portamonedas as $registro) {
                                ?>
                                <tr>
                                    <td> <?php echo $registro['id']; ?> </td>
                                    <td> <?php echo $registro['nombre']; ?> </td>
                                    <td> 
                                        <img width="50" src="<?php echo $registro['foto']; ?>" alt="Imagen-producto">
                                    </td>
                                    <td> <?php echo $registro['medidas']; ?> </td>
                                    <td> <?php echo $registro['conexiones']; ?> </td>
                                    <td> <?php echo $registro['billetera']; ?> </td>
                                    <td> <?php echo $registro['monedero']; ?> </td>
                                    <td> <?php echo $registro['profundidad']; ?> </td>
                                    <td> <?php echo $registro['anchura']; ?> </td>
                                    <td> <?php echo $registro['altura']; ?> </td>
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