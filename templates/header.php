<?php

$url_base = "http://localhost/practicasregnatec/";

?>

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
    <!--Css Panel de control-->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/index_Control.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/indexTablas.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/crearTablas.css">
    <!--Css Carrito -->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/carrito.css">
    <!--Css Switch Usuario-->
    <link rel="stylesheet" type="text/css" href="<?php echo $url_base; ?>assets/css/switchUsuarios.css">

    <!-- JS -->
    <script src="<?php echo $url_base; ?>assets/js/toggle-menu.js"></script>

    <!--<link rel="icon" href="/assets/img/logotipo.png">
    <link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/tienda.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/contacto.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/llamar.css">-->
    <!--Css Panel de control-->
    <!--<link rel="stylesheet" type="text/css" href="/assets/css/index_Control.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/indexTablas.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/crearTablas.css">-->
    <!--Css Carrito -->
    <!--<link rel="stylesheet" type="text/css" href="/assets/css/carrito.css">-->
    <!--Css Switch Usuario-->
    <!--<link rel="stylesheet" href="text/css" href="/assets/css/switchUsuarios.css">-->

</head>

<body>

    <header>
        <div class="wrap">
            <div class="logotipo" id="logotipo">
                <a href="<?php echo $url_base; ?>/index.php">
                    <!--<a href="/index.php">-->
                    <img src="<?php echo $url_base; ?>assets/img/logotipo.png" alt="logotipo">
                    <!--<img src="/assets/img/logotipo.png" alt="logotipo">-->
                </a>
            </div>

            <input type="checkbox" id="side-menu" class="side-menu">
            <label for="side-menu" id="side-menu" class="hamb">
                <span class="hamb-line"></span>
            </label>

            <nav class="nav">
                <ul id="menu" class="menu">
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
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Administrador') { ?>
                        <li id="control">
                            <a href="<?php echo $url_base; ?>/admin.php">Panel de control</a>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li>
                            <a href="<?php echo $url_base; ?>/login/index.php" id="login">
                                <img class="social-icon" src="<?php echo $url_base; ?>assets/img/user.png" alt="Icono-social">
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?php echo $url_base; ?>/login/index.php" id="login">
                                <img class="social-icon" src="<?php echo $url_base; ?>assets/img/user.png" alt="Icono-social">
                                Inicia sesión
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo $url_base; ?>/mostrarCarrito.php">
                            <svg class="shoppingCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span>(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</span>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_id'])) { ?>
                        <li>
                            <a href="<?php echo $url_base; ?>/login/logout.php">
                                <svg class="shoppingCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                            </a>
                        </li>
                    <?php } ?>
                </ul>


                <!--<ul class="menu">
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
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Administrador') { ?>
                        <li id="control">
                            <a href="/admin.php">Panel de control</a>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li>
                            <a href="/login/index.php" id="login">
                                <img class="social-icon" src="/assets/img/user.png" alt="Icono-social">
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="/login/index.php" id="login">
                                <img class="social-icon" src="/assets/img/user.png" alt="Icono-social">
                                Inicia sesión
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="/mostrarCarrito.php">
                            <svg class="shoppingCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                strokeWidth={1.5} stroke="currentColor" className="size-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                            <span>(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</span>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_id'])) { ?>
                        <li>
                            <a href="/login/logout.php">
                                <svg class="shoppingCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                </svg>
                            </a>
                        </li>
                    <?php } ?>
                </ul>-->
            </nav>
        </div>
    </header>