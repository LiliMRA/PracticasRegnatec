<?php
session_start();

ob_start(); #Inicia el almacenamiento en el búfer de salida

include ('../../bd.php');

include ('../../templates/header.php');

#$url_base = "http://localhost:3000/"; 
?>


<?php

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : ""; //Buscamos la imagen relacionado con el producto
    $sentencia = $conexion->prepare("SELECT Imagen1, Imagen2, Imagen3 FROM productos WHERE idId=:idId");
    $sentencia->bindParam(":idId", $txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    //Seleccionamos el archivo que se va a borrar
    if (isset($registro_recuperado["Imagen1"]) && $registro_recuperado["Imagen1"] != "") {
        if (file_exists("../../assets/img/productos/" . $registro_recuperado["Imagen1"])) {
            unlink("../../assets/img/productos/" . $registro_recuperado["Imagen1"]);
        }
    }

    if (isset($registro_recuperado["Imagen2"]) && $registro_recuperado["Imagen2"] != "") {
        if (file_exists("../../assets/img/productos/" . $registro_recuperado["Imagen2"])) {
            unlink("../../assets/img/productos/" . $registro_recuperado["Imagen2"]);
        }
    }

    if (isset($registro_recuperado["Imagen3"]) && $registro_recuperado["Imagen3"] != "") {
        if (file_exists("../../assets/img/productos/" . $registro_recuperado["Imagen3"])) {
            unlink("../../assets/img/productos/" . $registro_recuperado["Imagen3"]);
        }
    }


    #Sentencia para eliminar un registro
    $sentencia = $conexion->prepare("DELETE FROM productos WHERE idId=:idId");
    $sentencia->bindParam(":idId", $txtID);
    $sentencia->execute();
    header("Location:index.php");
    exit();
}

#Llamamos tabla prodcutos, asociada con la de familias de la BBDD
$sentencia = $conexion->prepare("SELECT * ,(SELECT name FROM familias WHERE familias.id = productos.familias_id LIMIT 1)AS Categoría FROM productos");
$sentencia->execute();
$lista_productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>





<div class="second-menu">
    <div class="second-nav">
        <ul class="second-menu">
            <li><a href="../familias/index.php" class="btn-secondMenu">Familias</a></li>
            <li><a href="index.php" class="btn-secondMenu">Productos</a></li>
            <li><a href="../usuarios//index.php" class="btn-secondMenu">Usuarios</a></li>
            <li><a href="#" class="btn-secondMenu">#####</a></li>
            <!--<li><a href="/panel_control/familias/index.php" class="btn-secondMenu">Familias</a></li>
            <li><a href="/panel_control/productos/index.php" class="btn-secondMenu">Productos</a></li>
            <li><a href="/panel_control/usuarios//index.php" class="btn-secondMenu">Usuarios</a></li>
            <li><a href="#" class="btn-secondMenu">#####</a></li>-->
        </ul>
    </div>
</div>

<h4>Productos</h4>

<section class="main-Tablas">
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
                                <td> <?php echo $registro['Categoría']; ?> </td>
                                <td> <?php echo $registro['Precio']; ?> </td>
                                <td>
                                    <img width="50" src="/assets/img/productos/<?php echo $registro['Imagen1']; ?>" alt="Imagen-producto1">
                                <td>
                                    <img width="50" src="/assets/img/productos/<?php echo $registro['Imagen2']; ?>" alt="Imagen-producto2">
                                </td>
                                <td>
                                    <img width="50" src="/assets/img/productos/<?php echo $registro['Imagen3']; ?>" alt="Imagen-producto3">
                                </td>
                        <!-- <td>
                                    <img width="50" src="<?php echo $url_base; ?>/assets/img/productos/<?php echo $registro['Imagen1']; ?>" alt="Imagen-producto1">
                                <td>
                                    <img width="50" src="<?php echo $url_base; ?>/assets/img/productos/<?php echo $registro['Imagen2']; ?>" alt="Imagen-producto2">
                                </td>
                                <td>
                                    <img width="50" src="<?php echo $url_base; ?>/assets/img/productos/<?php echo $registro['Imagen3']; ?>" alt="Imagen-producto3">
                                </td> -->
                                <td>
                                    <a class="btn-info" href="editar.php?txtID=<?php echo $registro['idId']; ?>">Editar</a>
                                    <a class="btn-danger"
                                        href="index.php?txtID=<?php echo $registro['idId']; ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

</section>

<?php

ob_end_flush(); //Envía el contenido almacenado en el búfer y desactiva el almacenamiento en el búfer de salida

include ('../../templates/footer.php');
?>