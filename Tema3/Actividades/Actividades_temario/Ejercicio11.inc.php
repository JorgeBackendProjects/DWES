<?php

    function validarDatos(string $data): string{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    } 

?>