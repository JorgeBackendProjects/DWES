<?php
    include_once(__DIR__ . "/../Model/Articulo.php");

    // Obtenemos todas las categorías de los artículos.
    $categorias = Articulo::getCategorias();

    echo json_encode($categorias);
?>