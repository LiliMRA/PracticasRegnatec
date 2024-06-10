<?php

session_start();

ob_start();

include ('../../templates/header.php');

include ('../../bd.php');
?>

<?php
#Código para eliminar una familia 
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    //Buscamos la imagen relacionado con el producto
    $sentencia = $conexion->prepare("SELECT Imagen FROM familias WHERE idId=:idId");
    $sentencia->bindParam(":idId", $txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    //Seleccionamos el archivo que se va a borrar
    if (isset($registro_recuperado["Imagen"]) && $registro_recuperado["Imagen"] != "") {
        if (file_exists("../../assets/img/" . $registro_recuperado["Imagen"])) {
            unlink("../../assets/img/" . $registro_recuperado["Imagen"]);
        }
    }
    
    $sentencia = $conexion->prepare("DELETE FROM familias WHERE id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");
    exit();
}

#Llamamos a la BBDD

$sentencia = $conexion->prepare("SELECT * FROM familias");
$sentencia->execute();
$lista_familias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="second-menu">
    <div class="second-nav">
        <ul class="second-menu">
            <li><a href="<?php echo $url_base; ?>/familias/index.php" class="btn-secondMenu">Familias</a></li>
            <li><a href="<?php echo $url_base; ?>/productos/index.php" class="btn-secondMenu">Productos</a></li>
            <li><a href="<?php echo $url_base; ?>/usuarios//index.php" class="btn-secondMenu">Usuarios</a></li>
            <li><a href="#" class="btn-secondMenu">#####</a></li>
            <!--<li><a href="/panel_control/familias/index.php" class="btn-secondMenu">Familias</a></li>
            <li><a href="/panel_control/productos/index.php" class="btn-secondMenu">Productos</a></li>
            <li><a href="/panel_control/usuarios/index.php" class="btn-secondMenu">Usuarios</a></li>
            <li><a href="#" class="btn-secondMenu">#####</a></li>-->
        </ul>
    </div>
</div>



<h4>Familias</h4>

<section class="main-Tablas">
    <div class="card-table">
        <div class="card-header">
            <a href="crear.php" class="btn-primary">
                Añadir familia
            </a>
        </div>

        <div class="card-body">
            <div class="main-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($lista_familias as $registro) {
                            ?>
                            <tr>
                                <td> <?php echo $registro['id']; ?> </td>
                                <td> <?php echo $registro['name']; ?> </td>
                                <td>
                                    <img width="150px" src="/assets/img/<?php echo $registro['Imagen']; ?>" alt="">  
                                </td>
                                <td>
                                    <a class="btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>">Editar</a>
                                    <a class="btn-danger" href="index.php?txtID=<?php echo $registro['id']; ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</section>

<?php

ob_end_flush();
include ('../../templates/footer.php');
?>