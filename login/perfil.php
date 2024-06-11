<?php

session_start();

#Verificamos si el usuario no está logeado
if (!isset($_SESSION['user_id'])) {
    #Si el usuario no está logeado, lo redirigimos al login
    header('Location: index.php');
    exit(); #Detenemos el script
}

include('../bd.php');

include('../templates/header.php');

$url_base = "http://localhost/practicasregnatec/";

#Verificamos si el usuario está logeado antes de hacer la consulta
if (isset($_SESSION['user_id'])) {
    $records = $conexion->prepare('SELECT id, usuario, email, password, rol FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    #Verificamos si $results no es false antes de usar count()
    if ($result !== false && count($result) > 0) {
        $user = $result;
    }
} #else {
#Si el usuario no está logeado, lo redirigimos a la pág para iniciar sesión
#header('Location:index.php');
#exit(); #Aeguramos que el script se detenga después de hacer la redirección

#}

?>

<section class="main-perfil">

    <div class="perfil-content">

        <div class="alertContainer">
            <?php if (!empty($user)) : ?>

                <p>Bienvenido, <span class="userName"><?= $user['usuario'] ?> </span> </p>
                <!--<a class="logoutButton" href="logout.php">-->
                <a class="logoutButton" href="<?php echo $url_base; ?>login/logout.php">
                    <svg class="shoppingCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                    </svg>
                </a>

            <?php endif; ?>
        </div>

        <aside class="asideIzq">
            
                <ul class="profileMenu">
                    <li><button>Perfil</li></button>
                    <li><button>Pedidos</li></button>
                    <li><button>Notificaciones</li></button>
                    <li><button>Configuración</li></button>
                </ul>
            
        </aside>

        <div class="profileInfo">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque pellentesque hendrerit. Aliquam velit urna, molestie nec molestie mollis, ultricies placerat magna. Duis vel est sit amet quam pellentesque bibendum a et nulla. Vivamus tristique porta nunc id fermentum. Pellentesque pretium ut nisi ac cursus. Fusce vehicula vel enim et porttitor. Sed ultrices congue ligula, ut gravida nisi vulputate vel. Proin auctor tincidunt sagittis.
        </div>

    </div>

</section>