<?php $url_base = "http://localhost/practicasregnatec/"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore</title>

    <link rel="icon" href="<?php echo $url_base; ?>assets/img/logotipo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/tienda.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/contacto.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/llamar.css">
    <!-- Css Panel de control -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/index_Control.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/indexTablas.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/crearTablas.css">
    <!-- Css Switch usuario -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/switchUsuarios">
    <!--
    <link rel="icon" href="assets/img/logotipo.png">
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/tienda.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/contacto.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/llamar.css">
    Css Panel de control
    <link rel="stylesheet" type="text/css" href="/assets/css/index_Control.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/indexTablas.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/crearTablas.css">-->
</head>

<body>

    <header>
        <div class="wrap">
            <div class="logotipo" id="logotipo">
                <a href="<?php echo $url_base; ?>/index.php">
                <!--<a href="/index.php"></a>-->
                <img src="<?php echo $url_base; ?>assets/img/logotipo.png" alt="logotipo">
                <!--<img src="/assets/img/logotipo.png" alt="logotipo">-->
                </a>
            </div>

            <nav class="nav">
                <ul class="menu">
                    <li>
                        <a href="<?php echo $url_base; ?>/index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="<?php echo $url_base; ?>/tienda.php">Tienda</a>
                    </li>
                    <li>
                        <a href="<?php echo $url_base; ?>/contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a href="<?php echo $url_base; ?>/llamar.php">Te llamamos</a>
                    </li>
                    <li id="control">
                        <a href="<?php echo $url_base; ?>/admin.php">Panel de control</a>
                    </li>
                    <li>
                        <a href="<?php echo $url_base; ?>/login/index.php" id="login">
                            <img class="social-icon" src="<?php echo $url_base; ?>assets/img/user.png" alt="Icono-social">
                            Inicia sesión
                        </a>
                    </li>
                </ul>
                <!--
                <ul class="menu">
                    <li>
                        <a href="/index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="/tienda.php">Tienda</a>
                    </li>
                    <li>
                        <a href="/contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a href="/llamar.php">Te llamamos</a>
                    </li>
                    <li id="control">
                        <a href="/panel_control/control.php">Panel de control</a>
                    </li>
                    <li>
                        <a href="/login/index.php" id="login">
                            <img class="social-icon" src="/assets/img/user.png" alt="Icono-social">
                            Inicia sesión
                        </a>
                    </li>
                </ul>-->
            </nav>
        </div>
    </header>