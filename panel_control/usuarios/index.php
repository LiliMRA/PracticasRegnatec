<?php include ('../../templates/header.php');

include ('../../bd.php');
?>

<?php

#Código para eliminar un usuario
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("DELETE FROM users WHERE id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");
}

#Llamamos a la BBDD
$sentencia = $conexion->prepare("SELECT * FROM users");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="second-menu">
    <div class="second-nav">
        <ul class="second-menu">
            <li><a href="index.php" class="btn-secondMenu">Familias</a></li>
            <li><a href="../productos/index.php" class="btn-secondMenu">Productos</a></li>
            <li><a href="../usuarios/index.php" class="btn-secondMenu">Usuarios</a></li>
            <li><a href="../../secciones/portamonedas/index.php" class="btn-secondMenu">Portamonedas</a></li>
        </ul>
    </div>
</div>

<h4>Usuarios</h4>

<section class="main-Tablas">
    <div class="card-table">
        <div class="card-header">
            <a href="crear.php" class="btn-primary">
                Añadir usuario
            </a>
        </div>

        <div class="card-body">
            <div class="main-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Contraseña</th>
                            <th>Tipo usuario</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($lista_usuarios as $registro) {
                            ?>
                            <tr>
                                <td> <?php echo $registro['id']; ?> </td>
                                <td> <?php echo $registro['usuario']; ?> </td>
                                <td> <?php echo $registro['email']; ?> </td>
                                <td> <?php echo $registro['password']; ?> </td>
                                <td>
                                    <form id="tipoForm<?php echo $registro['id']; ?>" action=""
                                        method="post">
                                        <input type="hidden" name="usuario_id" value="<?php echo $registro['id']; ?>">
                                        <input class="switch" type="checkbox"
                                            id="tipoCheckbox<?php echo $registro['id']; ?>" name="tipo" <?php echo ($registro['tipo'] == 'usuario') ? 'checked' : ''; ?>>
                                    </form>
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

<script>
    //Asigna la función al evento click del checkbox
    document.getElementById('tipoCheckbox<?php echo $registro['id']; ?>').addEventListener('click', function() {
        document.getElementById('tipoForm<?php echo $registro['id']; ?>').submit();
        this.disable = true; //Desactiva el checbox después de hacer click
    });
</script>