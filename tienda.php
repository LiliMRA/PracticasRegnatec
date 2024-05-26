<?php
include ('bd.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore</title>
    <link rel="icon" href="img/logotipo.png">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet"href="tienda.css">
</head>

<body>

    <header>
        <div class="wrap">
            <div class="logotipo" id="logotipo">
                <a href="index.html">
                    <img src="img/logotipo.png" alt="logotipo">
                </a>
            </div>

            <nav class="nav">
                <ul class="menu">
                    <li>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="tienda.php">Tienda</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                    </li>
                    <li>
                        <a href="#">Te llamamos</a>
                    </li>
                    <li>
                        <a href="#" id="login">
                            <img class="social-icon" src="img/user.png" alt="Icono-social">
                            Inicia sesión
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="main-section">
        <div class="products-menu">
            <div class="card-menu">
                <div class="face1">
                    <img src="img/27002.jpg" alt="">
                </div>
                <div class="face2">
                    <div class="ofert-content">
                        <p>Monitores</p>
                        <div class="boton">
                            <button name="click" id="click">
                                <a href="secciones/monitores/index.php">Ir a productos</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-menu">
                <div class="face1">
                    <img src="img/27002.jpg" alt="">
                </div>
                <div class="face2">
                    <div class="ofert-content">
                        <p>Impresoras térmicas</p>
                        <div class="boton">
                            <button name="click" id="click">
                                <a href="#">Ir a productos</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-menu">
                <div class="face1">
                    <img src="img/27002.jpg" alt="">
                </div>
                <div class="face2">
                    <div class="ofert-content">
                        <p>Portamonedas</p>
                        <div class="boton">
                            <button name="click" id="click">
                                <a href="#">Ir a productos</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-menu">
                <div class="face1">
                    <img src="img/27002.jpg" alt="">
                </div>
                <div class="face2">
                    <div class="ofert-content">
                        <p>Escaner</p>
                        <div class="boton">
                            <button name="click" id="click">
                                <a href="#">Ir a productos</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

<footer>
    <div class="apart">
        <ul>
            <li><a href="#">Loren ipsum</a></li>
            <li><a href="#">Loren ipsum</a></li>
            <li><a href="#">Loren ipsum</a></li>
            <li><a href="#">Loren ipsum</a></li>
        </ul>
    </div>

    <div class="social-media">
        <ul>
            <li>Social</li>
            <li>Social</li>
            <li>Social</li>
        </ul>
    </div>
</footer>

</html>