<?php include ('../../templates/header.php');

include ('../../bd.php'); ?>

<?php
#Código para eliminar una familia

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("DELETE FROM familias WHERE id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");
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
            <li><a href="../monitores/index.php" class="btn-secondMenu">Monitores</a></li>
            <li><a href="../portamonedas/index.php" class="btn-secondMenu">Portamonedas</a></li>
        </ul>
    </div>
</div>

<h4>Familias</h4>

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
                                    <a class="btn-danger"
                                        href="index.php?txtID=<?php echo $registro['idId']; ?>">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>