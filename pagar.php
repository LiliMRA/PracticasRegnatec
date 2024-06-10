<?php

session_start();

include ('bd.php');

include ('templates/header.php');

require_once ('config.php');

?>

<?php

$total = 0;

if (isset($_POST) && isset($_SESSION['user_id']) && isset($_SESSION['CARRITO'])) {


    echo "hola";
    $Sid = $_SESSION['user_id'];
    $Status = 'pendiente';

    #Calcular el prcio total del carrito
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {

        $total = $total + ($producto['Precio'] * $producto['Cantidad']);
    }

    $stmt = $conexion->prepare("INSERT INTO `ventas`
    (`ClaveTransaccion`, `Fecha`, `Total`, `Status`) VALUES
    (:ClaveTransaccion, NOW(), :Total, :Status);");

    $stmt->bindParam(":ClaveTransaccion", $Sid);
    $stmt->bindParam(":Total", $total);
    $stmt->bindParam(":Status", $Status);

    $stmt->execute();

    #Obtenemos el Id de la última venta
    $idVenta = $conexion->lastInsertId();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {

        $stmt = $conexion->prepare("INSERT INTO `detalleventas`
    (`idVenta`, `idProducto`, `PrecioUnitario`, `Cantidad`, `Descargado`) VALUES 
     (:idVenta, :idProducto, :PrecioUnitario, :Cantidad, '0');");

        $stmt->bindParam(":idVenta", $idVenta);
        $stmt->bindParam(":idProducto", $producto['idId']);
        $stmt->bindParam(":PrecioUnitario", $producto['Precio']);
        $stmt->bindParam(":Cantidad", $producto['Cantidad']);

        $stmt->execute();
    }

    echo "<h3>" . $total . "</h3>";
}

?>

<style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }

    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
        }
    }
</style>

<!-- Set up a container element for the button -->
<div id="paypal-button-container"></div>

<div>
    <h1>¡Paso final</h1>
    <hr>
    <p> Estás a punto de pagar con Paypal la cantidad de:
    <h4> <?php echo number_format($total, 2); ?> €</h4>

    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    </p>

    <p>info@bytestore.com</p>
</div>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        // Call your server to set up the transaction
        createOrder: function (data, actions) {
            return fetch('/demo/checkout/api/paypal/order/create/', {
                method: 'post'
            }).then(function (res) {
                return res.json();
            }).then(function (orderData) {
                return orderData.id;
            });
        },

        // Call your server to finalize the transaction
        onApprove: function (data, actions) {
            return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                method: 'post'
            }).then(function (res) {
                return res.json();
            }).then(function (orderData) {
                // Three cases to handle:
                //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                //   (2) Other non-recoverable errors -> Show a failure message
                //   (3) Successful transaction -> Show confirmation or thank you

                // This example reads a v2/checkout/orders capture response, propagated from the server
                // You could use a different API or structure for your 'orderData'
                var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                    return actions.restart(); // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                }

                if (errorDetail) {
                    var msg = 'Sorry, your transaction could not be processed.';
                    if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                    if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                    return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                }

                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');
</script>