<?php
include ('bd.php');

include ('templates/header.php');
?>

<section class="main-section">

    </div>
    <div class="products-menu">
        <div class="card-menu">
            <div class="face1">
                <img src="assets/img/hardware.png" alt="Imagen-hardware">
            </div>
            <div class="face2">
                <div class="ofert-content">
                    <p class="title-ofert">Hardware</p>
                    <div class="boton">
                        <button name="click" id="click">
                            <a href="#">Ir a hardware</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-menu">
            <div class="face1">
                <img src="https://newsbook.es/wp-content/uploads/2020/10/Software-AG-Newsbook-partners-768x512.jpg"
                    alt="">
            </div>
            <div class="face2">
                <div class="ofert-content">
                    <p>Software</p>
                    <div class="boton">
                        <button name="click" id="click">
                            <a href="#">Ir a software</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-menu">
            <div class="face1">
                <img src="https://miracomohacerlo.com/wp-content/uploads/2021/01/monitor-parlantes-proyector-1.jpg"
                    alt="">
            </div>
            <div class="face2">
                <div class="ofert-content">
                    <p>Periféricos</p>
                    <div class="boton">
                        <button name="click" id="click">
                            <a href="secciones/portamonedas/index.php">Ir a periféricos</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-menu">
            <div class="face1">
                <img src="https://tienda.eprodisa.com/img/p/6/3/2/632-medium_default.jpg" alt="">
            </div>
            <div class="face2">
                <div class="ofert-content">
                    <p>Escaner</p>
                    <div class="boton">
                        <button name="click" id="click">
                            <a href="secciones/escaner/index.php">Ir a productos</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('templates/footer.php'); ?>