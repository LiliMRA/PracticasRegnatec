

<php?

$servidor= "127.0.0.1";
$baseDeDatos = "bytestore";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$seridor; dbname=baseDeDatos", $usuario, $contrasenia);
} catch /Exception $ex) {
    echo $ex -> getMessage();
    ?>