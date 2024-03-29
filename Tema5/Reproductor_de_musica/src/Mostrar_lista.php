<?php
include_once("./clases/Usuario.php");

session_start();

if (!isset($_SESSION['usuario']) || !$_SESSION['usuario']) {
    header("Location: Iniciar_sesion.php");
    exit();
}

if (isset($_GET["nombreLista"])) {
    $nombreLista = $_GET["nombreLista"];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/001ac9542b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/mostrar_lista.css">
    <title>Lista de reproducción</title>
</head>

<body>
    <nav class="menu">
        <h1><?php echo "Lista " . $nombreLista; ?></h1>

        <ul>
            <li><a href="Cerrar_sesion.php">Cerrar sesión</a></li>
            <li><a href="Listas_reproduccion.php">Listas de reproducción</a></li>
            <li><a href="Index.php">Canciones</a></li>
            <li><a href="Mostrar_discos.php">Discos</a></li>
        </ul>
    </nav>

    <?php Usuario::mostrarCancionesLista(Usuario::obtenerCancionesLista($_SESSION["usuario"]["username"], $nombreLista), $nombreLista); ?>
</body>

</html>