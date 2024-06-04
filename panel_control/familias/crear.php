<?php
include("../../bd.php");
include("../../templates/header.php");

if ($_POST) { #Si se envía el formulario...

    #Recogemos datos del $_POST
    $name = (isset($_POST["name"]) ? $_POST["name"] : "");
    $Imagen = (isset($_FILE["Imagen"]) ? $_FILE["Imagen"] : "");
    #Adjuntamos Imagen
    $fecha_ = new DateTime();

    $nombreArchivo_Imagen = ($Imagen && $Imagen['name' != '']) ? $fecha_->getTimestamp() . "_" . $Imagen['name'] : "";
    $tmp_Imagen = $_FILES["Imagen"]['tmp_name'];

    #Insertamos los datos
    $sentencia = $conexion -> prepare("INSERT INTO familias
    (id, name, Imagen) VALUES
    (NULL, :name, :Imagen);");

    #Asignamos los valores
    $sentencia->bindParam(":name", $name);
    $sentencia->bindParam(":Imagen", $Imagen);

    #Ejecutamos
    $sentencia->execute();
    header("Location:index.php");
    die();
}
?>

<h4 class="subtitle"> Datos de la familia </h4>

<div class="card-form">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="line">
            <label for="name" class="form-label">Nombre</label>
            <br>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
        </div>

        <div class="line">
            <label for="Imagen" class="form-label">Imagen</label>
            <br>
            <input type="file" class="form-control" name="Imagen" id="Imagen" placeholder="Imagen">
        </div>

        <button type="submit" class="btn-success">Agregar registro</button>
        <a href="index.php" class="btn-danger">Cancelar</a>
    </form>
</div>

<?php include("../../templates/footer.php");