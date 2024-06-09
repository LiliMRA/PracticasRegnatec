<?php

session_start();

include ('bd.php');

include ('templates/header.php');

include ('carrito.php');

$stmt = $conexion->prepare("SELECT * FROM `productos`");
$stmt->execute();
$lista_productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="main-tienda">

    <div>
        <?php echo $mensaje; ?>
    </div>

    <div class="products-menu">
        <?php if (!empty($lista_productos)) { ?>
            <?php foreach ($lista_productos as $producto) { ?>
                <div class="card-menu">
                    <div class="face1">
                        <img src="/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen1']); ?>"
                            alt="<?php echo $producto['Nombre'] ?>">
                    </div>
                    <div class="face2">
                        <div class="ofert-content">
                            <h5 class="title-ofert"><?php echo htmlspecialchars($producto['Nombre']); ?></h5>
                            <p><?php echo htmlspecialchars($producto['Descripccion']); ?></p>
                            <div class="boton">
                                <form action="" method="post">
                                    <input type="hidden" name="idId" id="idId"
                                        value="<?php echo openssl_encrypt($producto['idId'], COD, KEY); ?>">
                                    <input type="hidden" name="Nombre" id="Nombre"
                                        value="<?php echo openssl_encrypt($producto['Nombre'], COD, KEY); ?>">
                                    <input type="hidden" name="Precio" id="Precio"
                                        value="<?php echo openssl_encrypt($producto['Precio'], COD, KEY); ?>">
                                    <input type="hidden" name="Cantidad" id="Cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);
                                    1; ?>">

                                    <button name="btnAccion" id="click" value="Agregar" type="submit">
                                        Añadir al carrito
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p> No hay productos disponibles en este momento. </p>
        <?php } ?>
    </div>



</section>

<?php include ('templates/footer.php'); ?>