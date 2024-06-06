<?php

session_start();

include ('templates/header.php');

include ('carrito.php');

include ('config.php');

?>

<br>
<h3>Lista del carrito</h3>
<!--<?php #if (!empty($_SESSION['CARRITO'])) { ?>-->

<table style="border: 1px solid black">
    <tbody>
        <tr>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>--</th>
        </tr>

        <tr>
            <td>Descripción</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Total</td>
            <td>--</td>
        </tr>

        <tr>
            <td><h3>Total</h3></td>
            <td><h3> €<?php echo number_format(200,2); ?> </h3></td>
            <td></td>
        </tr>
    </tbody>
</table>

<?php #} else { ?>
    <div class="">
        No hay productos en el carrito.
    </div>
    <?php #} ?>

    <?php

    include('templates/footer.php');

    ?>