<?php include('templates/header.php');

$url_base = "http://localhost/practicasregnatec/"; ?>

<section class="main-Index">


    <section class="portada">

        <div class="title">
            <h1>ByteStore</h1>
            <p>Tu destino tecnológico con un byte de difernecia</p>
        </div>
        <div class="galery">
            <div class="card">
                <div class="img-box">
                    <img src="assets/img/tienda-bytestore.jpg" alt="">
                </div>
                <div class="content">
                    <p>Visita nuestras instalaciones </p>
                </div>

            </div>
            <div class="card">
                <div class="img-box">
                    <img src="assets/img/tienda3.jpg" alt="">
                </div>
                <div class="content">
                    <p>Cuenta con atención personalizada en todo momento</p>
                </div>
            </div>
            <div class="card">
                <div class="img-box">
                    <img src="assets/img/tienda2.jpg" alt="">
                </div>
                <div class="content">
                    <p>Encontrarás los productos más acertados a tus necesidades</p>
                </div>
            </div>
        </div>
    </section>

    <div class="description">
        <div class="text">
            <h2>Lorem Ipsum</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum dolore, <br>hic tempore dignissimos
                nisi, <br>molestiae itaque explicabo excepturi harum cum rem, <br>iste ducimus eos voluptatum numquam
                modi tenetur iure praesentium?</p>

        </div>
        <div class="description-img">
            <img src="assets/img/working.jpg" alt="">
        </div>
    </div>

    <section class="main-oferts">
        <div class="oferts">
            <div class="card-products">

                <div class="face1">
                    <img src="assets/img/27002.jpg" alt="">
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
                    <img src="assets/img/27002.jpg" alt="">
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
                    <img src="assets/img/27002.jpg" alt="">
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
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 18.75 7.5-7.5 7.5 7.5" />
                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 7.5-7.5 7.5 7.5" />
            </svg>
        </a>
    </div>

    <?php include('templates/footer.php'); ?>
</section>