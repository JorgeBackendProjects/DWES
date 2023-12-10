<?php
    include_once("./Funciones.inc.php");
    $productos = decodificarJSON();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/Style.css">
        <title>Tienda Online</title>
    </head>
    <body>
        <!-- Se muestra el carrito de la compra a la derecha con una clase CSS. -->
        <div class="carrito">
            <h2>Carrito de Compra</h2>
            <?php mostrarCarrito($productos); ?>
        </div>

        <!-- Se muestran los productos -->
        <h1 style="text-align: center; margin-left: -200px;">Videojuegos</h1>
        <?php mostrarProductos($productos); ?>
    </body>
</html>

