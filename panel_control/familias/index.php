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
            <li><a href="index.php" class="btn-secondMenu">Familias</a></li>
            <li><a href="../productos/index.php" class="btn-secondMenu">Productos</a></li>
            <li><a href="../usuarios/index.php" class="btn-secondMenu">Usuarios</a></li>
            <li><a href="#" class="btn-secondMenu">#####</a></li>
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
                                <td> <?php echo $registro['Imagen']; ?> </td>
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