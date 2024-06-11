<?php

session_start();

include('templates/header.php');
include('bd.php');

$url_base = "http://localhost/practicasregnatec/"; ?>

<section class="main-Index">


    <section class="portada">

        <div class="title">
            <h1>ByteStore</h1>
            <p>Tu destino tecnológico con un byte de difernecia</p>
        </div>
        <div class="galery">
            <div class="card">
                <figure class="card_thumb">
                    <img class="img-box" src="<?php echo $url_base; ?>/assets/img/tienda-bytestore.jpg" alt="">
                    <!--<img class="img-box" src="assets/img/tienda-bytestore.jpg" alt="">-->
                    <figurecaption class="content">
                        <p class="card_snippet">Visita nuestras instalaciones </p>
                    </figurecaption>
                </figure>
            </div>

            <div class="card">
                <figure class="card_thumb">
                    <img class="img-box" src="<?php echo $url_base; ?>/assets/img/tienda3.jpg" alt="">
                    <!--<img class="img-box" src="assets/img/tienda3.jpg" alt="">-->
                    <figurecaption class="content">
                        <p class="card_snippet"> Cuenta con atención personalizada en todo momento </p>
                    </figurecaption>
                </figure>
            </div>

            <div class="card">
                <figure class="card_thumb">
                    <img class="img-box" src="<?php echo $url_base; ?>/assets/img/tienda2.jpg" alt="">
                    <!--<img class="img-box" src="assets/img/tienda2.jpg" alt="">-->
                    <figurecaption class="content">
                        <p class="card_snippet"> Encontrarás los productos más acertados a tus necesidades </p>
                    </figurecaption>
                </figure>
            </div>

        </div>
    </section>

    <div class="description-Info">
        <div class="text-Info">
            <h2>ByteStore</h2>
            <p>Tu tienda informática donde encontrarás lo último en hardware, software<br> y accesorios con el mejor asesoramiento.
                Descubre las mejores ofertas en<br> tecnología y equipa tu vida con lo último en informática. <br>
                Calidad, precio y servicio excepcional en un solo lugar.
            </p>

        </div>
        <div class="description-img">
            <img src="<?php echo $url_base; ?>assets/img/working.jpg" alt="">
            <!--<img src="assets/img/working.jpg" alt="">-->
        </div>
    </div>

    <section class="main-oferts">
        <div class="oferts">
            <div class="card-products">

                <div class="face1">
                    <img src="<?php echo $url_base; ?>assets/img/27002.jpg" alt="">
                    <!--<img src="assets/img/27002.jpg" alt="">-->
                </div>
                <div class="face2">
                    <div class="ofert-content">
                        <p>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit.</p>
                        <div class="boton">
                            <button name="click" id="click">
                                <a href="#">Ir a producto</a>
                            </button>
                        </div>

                    </div>

                </div>

            </div>
            <div class="card-products">

                <div class="face1">
                    <img src="<?php echo $url_base; ?>assets/img/27002.jpg" alt="">
                    <!--<img src="assets/img/27002.jpg" alt="">-->
                </div>
                <div class="face2">
                    <p>Lorem ipsu dolor sit amet <br>consectetur adipisicing elit.</p>
                    <button name="click" id="click">
                        <a href="#">Ir a producto</a>
                    </button>
                </div>
            </div>

            <div class="card-products">

                <div class="face1">
                    <img src="<?php echo $url_base; ?>assets/img/27002.jpg" alt="">
                    <!--<img src="assets/img/27002.jpg" alt="">-->
                </div>
                <div class="face2">
                    <p>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit.</p>
                    <button name="click" id="click">
                        <a href="#">Ir a producto</a>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <section class="questions">
        <div class="preguntas">
            <button class="title-questions" aria-hidden="true">
                <span class="circle">
                    <span class="arrow-icon"></span>
                </span>
                <span class="button-text">
                    Preguntas frecuentes
                </span>
            </button>


            <div class="toggle-question">
                <ul>
                    <li>Loren ipsum</li>
                    <li>Loren ipsum</li>
                    <li>Loren ipsum</li>
                    <li>Loren ipsum</li>
                    <li>Loren ipsum</li>
                </ul>
            </div>

        </div>
    </section>

    <div class="scroll">
        <a href="#logotipo">
            Subir
        </a>
    </div>

    <?php
    include('templates/footer.php');
    ?>
</section>