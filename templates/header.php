<?php $url_base = "http://localhost/practicasregnatec/"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore</title>
    <link rel="icon" href="img/logotipo.png">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="tienda.css">
    <link rel="stylesheet" type="text/css" href="contacto.css">
    <link rel="stylesheet" type="text/css" href="llamar.css">
    <!-- Css Panel de control -->
    <link rel="stylesheet" type="text/css" href="panel_control/index.css">
    <link rel="stylesheet" type="text/css" href="panel_control/crear.css">
</head>

<body>

    <header>
        <div class="wrap">
            <div class="logotipo" id="logotipo">
                <a href="<?php $url_base?>index.php">
                    <img src="img/logotipo.png" alt="logotipo">
                </a>
            </div>

            <nav class="nav">
                <ul class="menu">
                    <li>
                        <a href="<?php echo $url_base?>index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="<?php echo $url_base?>tienda.php">Tienda</a>
                    </li>
                    <li>
                        <a href="<?php echo $url_base?>contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a href="<?php echo $url_base?>llamar.php">Te llamamos</a>
                    </li>
                    <li id="control">
                        <a href="<?php echo $url_base?>/panel_control/productos/index.php">Panel de control</a>
                    </li>
                    <li>
                        <a href="<?php $url_base?>login/index.php" id="login">
                            <img class="social-icon" src="img/user.png" alt="Icono-social">
                            Inicia sesión
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>