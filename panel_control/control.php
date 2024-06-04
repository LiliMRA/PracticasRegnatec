<?php include ('../bd.php');
include ('../templates/header.php'); ?>

<section class="main-control">

    <h2 class="title-control"> PANEL DE CONTROL </h2>

    <div class="second-menu">
        <div class="second-nav">
            <ul class="second-menu">
                <li><a href="/panel_control/familias/index.php" class="btn-secondMenu">Familias</a></li>
                <li><a href="/panel_control/productos/index.php" class="btn-secondMenu">Productos</a></li>
                <!--<li><a href="/panel_control/familias/index.php" class="btn-secondMenu">Familias</a></li>
                <li><a href="/panel_control/productos/index.php" class="btn-secondMenu">Productos</a></li>-->

                <li><a href="/panel_control/usuarios/index.php" class="btn-secondMenu">Usuarios</a></li>
                <li><a href="../portamonedas/index.php" class="btn-secondMenu">Portamonedas</a></li>
            </ul>
        </div>
    </div>

    <div class="img-control">
        <img src="../assets/img/undraw.svg" alt="Imagen-corporativa">
    </div>

    <?php include ('../templates/footer.php'); ?>
</section>