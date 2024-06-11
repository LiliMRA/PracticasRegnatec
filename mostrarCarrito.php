<?php

session_start();

include('templates/header.php');

include('carrito.php');


?>

<div class="main-mostrarCarrito">

    <br>
    <h3 class="title">Tu carrito</h3>
    <?php if (!empty($_SESSION['CARRITO'])) {
    ?>

        <div class="shoppingBag">

            <?php $total = 0; ?>
            <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>

                <div class="shoppingBag-Card">


                    <div class="shoppingBag-head">
                        <img src="<?php echo $url_base; ?>/assets/img/productos/<?php echo $producto['Imagen1'] ?>">
                    </div>

                    <div class="shoppingBag-body">
                        <h5><?php echo $producto['Nombre']; ?></h5>
                        <p><?php echo $producto['Cantidad']; ?> </p>
                        <p><?php echo $producto['Precio']; ?> </p>

                        <div class="shoppingActions">
                            <form action="" method="post">
                                <input type="hidden" name="idId" id="idId" value="<?php echo openssl_encrypt($producto['idId'], COD, KEY); ?>">
                                <!--<button name="btnAccion" id="click" value="Eliminar" type="submit">
                                    Eliminar
                                </button>-->
                                <button class="button" type="submit" name="btnAccion" id="click" value="Eliminar">
                                    <span class="button__text">Eliminar</span>
                                    <span class="button__icon"><svg class="svg" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                            <title></title>
                                            <path d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320" style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                            <line style="stroke:#fff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px" x1="80" x2="432" y1="112" y2="112"></line>
                                            <path d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40" style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                            <line style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" x1="256" x2="256" y1="176" y2="400"></line>
                                            <line style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" x1="184" x2="192" y1="176" y2="400"></line>
                                            <line style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" x1="328" x2="320" y1="176" y2="400"></line>
                                        </svg></span>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

                <?php $total = $total + ($producto['Precio'] * $producto['Cantidad']); ?>
            <?php } ?>

        </div>

        <div class="finalPrice">
            <h3>Total del carrito: <?php echo number_format($total, 2); ?>€</h3>

            <div class="arrowDirections">
                <img src="<?php echo $url_base; ?>assets/img/up-arrow.png" alt="Flecha-derecha">
                <img src="<?php echo $url_base; ?>assets/img/up-arrow.png" alt="Flecha-derecha">
                <img src="<?php echo $url_base; ?>assets/img/up-arrow.png" alt="Flecha-derecha">
            </div>


            <div class="payBtn">
                <form action="pagar.php" method="post">
                    <label for="pagar"> Finalizar pago</label>
                    <!--<input type="email" name="email" id="email" required placeholder="Escribe tu correo">-->
                    <button type="submit" name="btnAccion" value="pagar" class="btn--Pay">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    <?php } else {
    ?>
        <div class="">
            No hay productos en el carrito.
        </div>

    <?php } ?>
    <!--
            <table class="shoppingTable">
                <tbody>
                    <tr>
                        <th width="40%">Artículo</th>
                        <th width="15%">Cantidad</th>
                        <th width="20%">Precio</th>
                        <th width="20%">Total</th>
                        <th width="5%">--</th>
                    </tr>


                    <tr>
                        <td width="40%">
                            <div class="cardArticle">-->
    <!--<img src="/assets/img/productos/<?php echo $producto['Imagen1'] ?>">-->
    <!-- <img src="<?php echo $url_base; ?>/assets/img/productos/<?php echo $producto['Imagen1'] ?>">
                                <?php echo $producto['Nombre'] ?>
                            </div>
                        </td>
                        <td width="15%">
                            <div class="cardArticle">
                                <?php echo $producto['Cantidad'] ?>
                            </div>
                        </td>
                        <td width="20%">
                            <div class="cardArticle">
                                <?php echo $producto['Precio'] ?>
                            </div>
                        </td>
                        <td width="20%">
                            <div class="cardArticle">
                                <?php echo number_format($producto['Precio'] * $producto['Cantidad'], 2); ?>
                            </div>
                        </td>

                        <td width="5%">
                            <form action="" method="post">
                                <input type="hidden" name="idId" id="idId" value="<?php echo openssl_encrypt($producto['idId'], COD, KEY); ?>">
                                <button name="btnAccion" id="click" value="Eliminar" type="submit">
                                    Eliminar
                                </button>
                            </form>
                        </td>

                    </tr>

                <tr>
                    <td colspan="3" align="rigth">
                        <h3>Total de compra</h3>
                    </td>
                    <td align="rigth">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="5">
                        <form action="pagar.php" method="post">
                            <label for="pagar"> Procesar pago </label>-->
    <!--<input type="email" name="email" id="email" required placeholder="Escribe tu correo">-->
    <!--<button type="submit" name="btnAccion" value="pagar"> Pagar >> </button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>-->



</div>

<?php

include('templates/footer.php');

?>