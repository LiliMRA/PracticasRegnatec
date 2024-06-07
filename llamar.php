<?php
session_start();

include('templates/header.php');
?>


<div class="main-contact">
    <div class="description-img">
        <img src="assets/img/call-center.jpg">
    </div>


    <div class="main-form">
        <h3 class="callback">Solicita una cita rellenando el formulario<br> con tus datos y nos pondremos en contacto
            <br>contigo
        </h3>
        <form action="" method="post" class="form">

            <div class="cell">
                <div class="cell-content">
                    <label for="nombre" class="label-control">Nombre*</label> <br>
                    <input type="text" class="input-control" name="nombre" id="nombre" required>
                </div>

                <div class="cell-content">
                    <label for="apellidos" class="label-control">Apellidos*</label> <br>
                    <input type="text" class="input-control" name="apellidos" id="apellidos" required>
                </div>
            </div>

            <div class="cell">
                <div class="cell-content">
                    <label for="phone" class="label-control">Teléfono*</label> <br>
                    <input type="tel" class="input-control" id="phone" name="phone" required />
                </div>

                <div class="cell-content">
                    <label for="correo" class="label-control">Correo electrónico*</label> <br>
                    <input type="email" class="input-control" id="correo" name="correo" required>
                </div>
            </div>

            <div class="cell" id="date-div">
                <div class="cell-content">
                    <label for="fecha" class="label-control">Fecha*</label> <br>
                    <input type="date" id="fecha" name="fecha" value="2024-05-03" min="2024-05-03" max="2024-07-31" required />
                </div>

                <div class="cell-content">
                    <label for="hora">Hora:*</label> <br>
                    <input type="time" id="hora" name="hora" min="08:00" max="16:30" required />
                </div>
            </div>
            <br>
            <small>Horario de oficina de 08:00 a 16:30</small>

            <div class="cell-check">
                <input type="checkbox" class="input-control" id="check" name="check" required>
                <label for="check" class="label-control">Acepto las <a href="#">Políticas de privacidad</a></label>
            </div>



        </form>
    </div>
</div>

<?php 
include('templates/footer.php'); 
?>