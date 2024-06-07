<?php

#session_start();
include ('bd.php');

include ('config.php');

$mensaje = "";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case 'Agregar':

            if (is_numeric(openssl_decrypt($_POST['idId'], COD, KEY))) {
                $idId = openssl_decrypt($_POST['idId'], COD, KEY);
                $mensaje = "Ok idId Correcto" . $idId;
            } else {
                $mensaje = "Uppss... idId incorrecto";
            }

            if (is_string(openssl_decrypt($_POST['Nombre'], COD, KEY))) {
                $Nombre = openssl_decrypt($_POST['Nombre'], COD, KEY);
            } else {
                $mensaje = "Uppss... Nombre incorrecto";
                break;
            }

            if (is_numeric(openssl_decrypt($_POST['Precio'], COD, KEY))) {
                $Precio = openssl_decrypt($_POST['Precio'], COD, KEY);
            } else {
                $mensaje = "Uppss... Precio incorrecto";
                break;
            }

            if (is_numeric(openssl_decrypt($_POST['Cantidad'], COD, KEY))) {
                $Cantidad = openssl_decrypt($_POST['Cantidad'], COD, KEY);
            } else {
                $mensaje = "Uppss... Cantidad incorrecto";
                break;
            }

            if (!isset($_SESSION['CARRITO'])) {

                $producto = array(
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

        case 'Eliminar':
            if (is_numeric(openssl_decrypt($_POST['idId'], COD, KEY))) { 
                $idId = openssl_decrypt($_POST['idId'], COD, KEY);

                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['idId'] == $idId) {
                        unset($_SESSION['CARRITO'][$indice]);

                        # Reindexamos el array para evitar problemas de índices
                        $_SESSION['CARRITO'] = array_values($_SESSION['CARRITO']);
                        
                        break;
                    }
                }
                
            } else {
                $mensaje = "Uppss... idId incorrecto";
            }
            break;
    }
}





