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

    <div class="Shop--products-menu">
        <?php if (!empty($lista_productos)) { ?>
            <?php foreach ($lista_productos as $producto) { ?>
                <div class="card-menu">
                    <div class="cardFaces">
                        <div class="shop--face1">
                            <!--<div class="face1Img">
                            <img src="<?php echo $url_base; ?>/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen1']); ?>" alt="<?php echo $producto['Nombre'] ?>">
                        </div>-->
                            <div class="face1Img">
                                <img src="/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen1']); ?>"
                                    alt="<?php echo $producto['Nombre'] ?>">
                            </div>


                            <div class="material-buttons">
                                <button class="btn-materialButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path fill-rule="evenodd"
                                            d="M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <button class="btn-materialButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="shop--face2">
                            <div class="shopofert-content">
                                <div class="ofert-contentUp">
                                    <h4 class="title-ofert"><?php echo htmlspecialchars($producto['Nombre']); ?></h4>
                                    <p><?php echo htmlspecialchars($producto['Descripccion']); ?></p>

                                </div>

                                <div class="ofertcontentDown">
                                    <div class="price">
                                        <p>
                                            <?php echo htmlspecialchars($producto['Precio']); ?>€
                                        </p>
                                    </div>

                                    <!--<div class="variants">
                                    <ul>
                                        <li>
                                            <img src="<?php echo $url_base; ?>/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen1']); ?>" alt="<?php echo $producto['Nombre'] ?>">
                                        </li>

                                        <li>
                                            <img src="<?php echo $url_base; ?>/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen2']); ?>" alt="<?php echo $producto['Nombre'] ?>">
                                        </li>

                                        <li>
                                            <img src="<?php echo $url_base; ?>/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen3']); ?>" alt="<?php echo $producto['Nombre'] ?>">
                                        </li>
                                    </ul>
                                </div>-->
                                    <div class="variants">
                                        <ul>
                                            <li>
                                                <img src="/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen1']); ?>"
                                                    alt="<?php echo $producto['Nombre'] ?>">
                                            </li>

                                            <li>
                                                <img src="/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen2']); ?>"
                                                    alt="<?php echo $producto['Nombre'] ?>">
                                            </li>

                                            <li>
                                                <img src="/assets/img/productos/<?php echo htmlspecialchars($producto['Imagen3']); ?>"
                                                    alt="<?php echo $producto['Nombre'] ?>">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="boton">
                        <form action="" method="post">
                            <input type="hidden" name="idId" id="idId"
                                value="<?php echo openssl_encrypt($producto['idId'], COD, KEY); ?>">
                            <input type="hidden" name="Nombre" id="Nombre"
                                value="<?php echo openssl_encrypt($producto['Nombre'], COD, KEY); ?>">
                            <input type="hidden" name="Imagen1" id="Imagen1"
                                value="<?php echo openssl_encrypt($producto['Imagen1'], COD, KEY); ?>">
                            <input type="hidden" name="Precio" id="Precio"
                                value="<?php echo openssl_encrypt($producto['Precio'], COD, KEY); ?>">
                            <input type="hidden" name="Cantidad" id="Cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);
                            1; ?>">

                            <button name="btnAccion" class="btn--add" value="Agregar" type="submit">
                                Añadir al carrito
                            </button>
                        </form>
                    </div>
                </div>


            <?php } ?>
        <?php } else { ?>
            <p> No hay productos disponibles en este momento. </p>
        <?php } ?>
    </div>



</section>

<?php include ('templates/footer.php'); ?>