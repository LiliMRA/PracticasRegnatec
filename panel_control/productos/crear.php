<?php

session_start();

ob_start(); #Inicia el almacenamiento en el búfer de salida

include('../../bd.php');

include('../../templates/header.php'); 
?>

<?php

if ($_POST) {
    # Recogemos los datos del $_POST
    $Nombre = (isset($_POST["Nombre"]) ? $_POST["Nombre"] : "");
    $Descripccion = (isset($_POST["Descripccion"]) ? $_POST["Descripccion"] : "");
    $Precio = (isset($_POST["Precio"]) ? $_POST["Precio"] : "");
    $familias_id = (isset($_POST["familias_id"]) ? $_POST["familias_id"] : "");
    $Imagen1 = (isset($_POST["Imagen1"]) ? $_POST["Imagen1"] : "");
    $Imagen2 = (isset($_POST["Imagen2"]) ? $_POST["Imagen2"] : "");
    $Imagen3 = (isset($_POST["Imagen3"]) ? $_POST["Imagen3"] : "");

    # Insertamos los datos
    $sentencia = $conexion->prepare("INSERT INTO productos
(Nombre, Descripccion, familias_id, Precio, Imagen1, Imagen2, Imagen3) VALUES
(:Nombre, :Descripccion, :familias_id, :Precio, :Imagen1, :Imagen2, :Imagen3);");

    # Asignamos los valores
    $sentencia->bindParam(":Nombre", $Nombre);
    $sentencia->bindParam(":Descripccion", $Descripccion);
    $sentencia->bindParam(":Precio", $Precio);
    $sentencia->bindParam(":familias_id", $familias_id);

    # Adjuntamos foto
    $fecha_ = new DateTime();

    $nombreArchivo_Imagen1 = ($Imagen1 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen1"]['name'] : "";
    $tmp_Imagen1 = $_FILES["Imagen1"]['tmp_name'];
    /*
    if ($tmp_Imagen1 != '') {
        move_uploaded_file($tmp_Imagen1, "./" . $nombreArchivo_Imagen1);
    }

    $nombreArchivo_Imagen2 = ($Imagen2 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen2"]['name'] : "";
    $tmp_Imagen2 = $_FILES["Imagen2"]['tmp_name'];

    if ($tmp_Imagen2 != '') {
        move_uploaded_file($tmp_Imagen2, "./" . $nombreArchivo_Imagen2);
    }

    $nombreArchivo_Imagen3 = ($Imagen3 != '') ? $fecha_->getTimestamp() . "_" . $_FILES["Imagen3"]['name'] : "";
    $tmp_Imagen3 = $_FILES["Imagen3"]['tmp_name'];

    if ($tmp_Imagen3 != '') {
        move_uploaded_file($tmp_Imagen3, "./" . $nombreArchivo_Imagen3);
    }*/

    $sentencia->bindParam(":Imagen1", $nombreArchivo_Imagen1);
    $sentencia->bindParam(":Imagen2", $nombreArchivo_Imagen2);
    $sentencia->bindParam(":Imagen3", $nombreArchivo_Imagen3);

    # Ejecutamos
    $sentencia->execute();
    header("Location:index.php");
    exit(); // Asegura que el script se detiene después del redireccionamiento
}
?>

<?php
$sentencia = $conexion->prepare("SELECT * FROM familias");
$sentencia->execute();
$lista_familias = $sentencia->fetchAll((PDO::FETCH_ASSOC));

?>

<section class="mainTablas">
    <h4 class="subtitle">Datos del producto</h4>

    <div class="card-form">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="line">
                <label for="Nombre" class="form-label">Nombre</label>
                <br>
                <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre">
            </div>

            <div class="line">
                <label for="descripccion" class="form-label">Descripción</label>
                <br>
                <input type="text" class="form-control" name="descripccion" id="descripccion" placeholder="Descripción">
            </div>

            <div class="line">
                <label for="familias_id" class="form-label">Categoría</label>
                <br>
                <select name="familias_id" id="familias_id">
                    <?php
                    foreach ($lista_familias as $registro) {
                    ?>
                        <option value="<?php echo $registro['id']; ?>">
                            <?php echo $registro['name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="line">
                <label for="Precio" class="form-label">Precio</label>
                <br>
                <input type="text" class="form-control" name="Precio" id="Precio" placeholder="Precio">
            </div>

            <div class="line">
                <label for="Imagen1" class="form-label">Imagen 1</label>
                <br>
                <input type="file" class="form-control" name="Imagen1" id="Imagen1" placeholder="Imagen1">
            </div>

            <div class="line">
                <label for="Imagen2" class="form-label">Imagen 2</label>
                <br>
                <input type="file" class="form-control" name="Imagen2" id="Imagen2" placeholder="Imagen2">
            </div>

            <div class="line">
                <label for="Imagen3" class="form-label">Imagen 3</label>
                <br>
                <input type="file" class="form-control" name="Imagen3" id="Imagen3" placeholder="Imagen3">
            </div>

            <button type="submit" class="btn-success">Agregar registro</button>
            <a href="index.php" class="btn-danger">Cancelar</a>
        </form>
    </div>
</section>


<?php 
ob_end_flush(); //Envía el contenido almacenado en el búfer y desactiva el almacenamiento en el búfer de salida 
include('../../templates/footer.php'); 
?>