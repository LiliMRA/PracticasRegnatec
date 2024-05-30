<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteStore</title>
    <link rel="icon" href="img/logotipo.png">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="llamar.css">
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
                        <a href="contacto.html">Contacto</a>
                    </li>
                    <li>
                        <a href="llamar.php">Te llamamos</a>
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

    <div class="main-contact">
        <div class="description-img">
            <img src="img/call-center.jpg">
        </div>


        <div class="main-form">
            <h3>Solicita una cita rellenando el formulario<br> con tus datos y nos pondremos en contacto <br>contigo
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


            </form>
        </div>
    </div>
</body>

</html>