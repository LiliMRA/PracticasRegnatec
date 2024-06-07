<?php

include('bd.php');

include('tienda.php');

?>

<?php

if($_POST) {

    $total = 0;

    $Sid = session_id();
    $Correo = $_POST['email'];
    $Status = 'pendiente';

    foreach($_SESSION['CARRITO'] as $indice => $producto) {

        $total = $total + ($producto['Precio'] * $producto['Cantidad']);

        $stmt = $conexion -> prepare("INSERT INTO `ventas`
        (`ClaveTransaccion`, `Fecha`, `Correo`, `Total`) VALUES
        (:ClaveTransaccion, NOW(), :Correo, :Total);");

        $stmt -> bindParam(":ClaveTransaccion", $Sid);
        $stmt -> bindParam(":Correo", $Correo);
        $stmt -> bindParam(":Total", $total);

        $stmt -> execute();
        $idVenta = $conexion -> lastInsertId();

    }
    echo "<h3>". $total ."</h3>";
}
?>


