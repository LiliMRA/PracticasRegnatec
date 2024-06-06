<?php

include ('bd.php');

$mensaje = "";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case 'Agregar':

            if (is_numeric(openssl_cms_decrypt($_POST['idId'], COD, KEY))) {
                $idId = openssl_cms_decrypt($_POST['idId'], COD, KEY);
                $mensaje = "Ok idId Correcto" . $idId;
            } else {
                $mensaje = "Uppss... idId incorrecto";
            }

            if (is_string(openssl_cms_decrypt($_POST['Nombre'], COD, KEY))) {
                $Nombre = openssl_cms_decrypt($_POST['Nombre'], COD, KEY);
            } else {
                $mensaje = "Uppss... Nombre incorrecto";
                break;
            }

            if (is_string(openssl_cms_decrypt($_POST['Precio'], COD, KEY))) {
                $Precio = openssl_cms_decrypt($_POST['Precio'], COD, KEY);
            } else {
                $mensaje = "Uppss... Precio incorrecto";
                break;
            }

            if (is_string(openssl_cms_decrypt($_POST['Cantidad'], COD, KEY))) {
                $Cantidad = openssl_cms_decrypt($_POST['Cantidad'], COD, KEY);
            } else {
                $mensaje = "Uppss... Cantidad incorrecto";
                break;
            }

            if (!isset($_SESSION['CARRITO'])) {

                $producto = array (
                    'idId' => $idId,
                    'Nombre' => $Nombre,
                    'Cantidad' => $Cantidad,
                    'Precio' => $Precio
                );
                $_SESSION['CARRITO'][0] = $producto;

            } else {

                $NumProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'idId' => $idId,
                    'Nombre' => $Nombre,
                    'Cantidad' => $Cantidad,
                    'Precio' => $Precio
                );
                $_SESSION['CARRITO'][$NumProductos] = $producto;
            }

            break;
    }
}
?>

<section class="mainCarrito">



</section>