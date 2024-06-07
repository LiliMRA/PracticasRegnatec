<?php

session_start();

include('templates/header.php');

include('carrito.php');

include('config.php');

?>

<div class="main-mostrarCarrito">

    <br>
    <h3 class="title">Tu carrito</h3>
    <?php if (!empty($_SESSION['CARRITO'])) { 
        ?>

    <table class="shoppingTable">
        <tbody>
            <tr>
                <th width="38%">Artículo</th>
                <th width="13%">Cantidad</th>
                <th width="23%">Precio</th>
                <th width="18%">Total</th>
                <th>--</th>
            </tr>

            <tr>
                <td width="38%">
                    <div class="cardArticle">Descripción</div>
                </td>
                <td width="13%">
                    <div class="cardArticle">Cantidad</div>
                </td>
                <td width="23%">
                    <div class="cardArticle">Precio</div>
                </td>
                <td width="18%">
                    <div class="cardArticle">Total</div>
                </td>
                <td>--</td>
            </tr>

            <tr>
                <td colspan="2">
                    <h3 float="rigth">Total</h3>
                </td>
                <td>
                    <h3 float="rigth"> €<?php echo number_format(200, 2); ?> </h3>
                </td>
                <td></td>
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

include('templates/footer.php');

?>