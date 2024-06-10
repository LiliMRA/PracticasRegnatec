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
            }

            if (is_string(openssl_decrypt($_POST['Nombre'], COD, KEY))) {
                $Nombre = openssl_decrypt($_POST['Nombre'], COD, KEY);
            } 

            if (is_string(openssl_decrypt($_POST['Imagen1'], COD, KEY))) {
                $Imagen1 = openssl_decrypt($_POST['Imagen1'], COD, KEY);
            }

            if (is_numeric(openssl_decrypt($_POST['Precio'], COD, KEY))) {
                $Precio = openssl_decrypt($_POST['Precio'], COD, KEY);
            }

            if (is_numeric(openssl_decrypt($_POST['Cantidad'], COD, KEY))) {
                $Cantidad = openssl_decrypt($_POST['Cantidad'], COD, KEY);
            } 

            if (!isset($_SESSION['CARRITO'])) {

                $producto = array(
                    'idId' => $idId,
                    'Imagen1' => $Imagen1,
                    'Nombre' => $Nombre,
                    'Cantidad' => $Cantidad,
                    'Precio' => $Precio
                );
                $_SESSION['CARRITO'][0] = $producto;

            } else {

                $NumProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'idId' => $idId,
                    'Imagen1' => $Imagen1,
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
                
            } 
            break;
    }
}





