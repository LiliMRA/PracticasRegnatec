<?php

session_start();

include ('templates/header.php');

include ('carrito.php');


?>

<div class="main-mostrarCarrito">

    <br>
    <h3 class="title">Tu carrito</h3>
    <?php if (!empty($_SESSION['CARRITO'])) {
        ?>

        <table class="shoppingTable">
            <tbody>
                <tr>
                    <th width="40%">Artículo</th>
                    <th width="15%">Cantidad</th>
                    <th width="20%">Precio</th>
                    <th width="20%">Total</th>
                    <th width="5%">--</th>
                </tr>

                <?php $total = 0; ?>
                <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                    <tr>
                        <td width="40%">
                            <div class="cardArticle">
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
                                <input type="hidden" name="idId" id="idId"
                                    value="<?php echo openssl_encrypt($producto['idId'], COD, KEY); ?>">
                                <button name="btnAccion" id="click" value="Eliminar" type="submit">
                                    Eliminar
                                </button> 
                            </form>
                        </td>

                    </tr>
                    <?php $total = $total + ($producto['Precio'] * $producto['Cantidad']); ?>
                <?php } ?>

                <tr>
                    <td colspan="3" align="rigth">
                        <h3>Total de compra</h3>
                    </td>
                    <td align="rigth">
                        <h3>€<?php echo number_format($total, 2); ?> </h3>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="5">
                        <form action="pagar.php" method="post">
                            <label for="pagar"> Procesar pago </label>
                            <!--<input type="email" name="email" id="email" required placeholder="Escribe tu correo">-->
                            <button type="submit" name="btnAccion" value="pagar"> Pagar >> </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

    <?php } else {
        ?>
        <div class="">
            No hay productos en el carrito.
        </div>
    <?php }
    ?>

</div>

<?php

include ('templates/footer.php');

?>