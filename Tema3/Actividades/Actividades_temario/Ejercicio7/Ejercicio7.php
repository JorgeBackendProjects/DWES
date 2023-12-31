<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 7</title>

        <style>
            body{
                background-color: aliceblue;
            }

            .input{
                border: 10px;
            }
        </style>
    </head>
    <body>
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <p>
                <label>Nombre de usuario: </label>
                <input type="text" name="nombre" pattern=".+" required/>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['nombre'])){
                        echo "<span style='color:red'>--&lt; Debes introducir tu nombre!!</span>";
                    }
                ?>
            </p> 

            <p>
                <label>E-mail: </label>
                <input type="email" name="email" pattern=".+" required/>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['email'])){
                        echo "<span style='color:red'>--&lt; Debes introducir tu email!!</span>";
                    }
                ?>
            </p>
            
            <p>
                <label>Contraseña: </label>    
                <input type="password" name="password" pattern=".+" required/>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['password'])){
                        echo "<span style='color:red'>--&lt; Debes introducir tu contraseña!!</span>";
                    }
                ?>
            </p>

            <input type="submit" value="Enviar" name="enviar"/>
        </form>

        <?php
            include_once('../Ejercicio11.inc.php');

            $rutaJSON = "./usuarios.json";
            $jsonString = file_get_contents($rutaJSON);
            $arrayUsuarios = json_decode($jsonString, true);

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    foreach($arrayUsuarios as $key => &$usuario) {
                        if($usuario['username'] == validarDatos($_POST['nombre']) && $usuario['email'] == validarDatos($_POST['email']) && $usuario['password'] == validarDatos($_POST['password'])){
                            echo "<p>Hola " . $_POST['nombre'] . "!!</p>";

                            echo "<p>Contraseña original: " . $usuario['password'];
                            $usuario['password'] = password_hash($usuario['password'], PASSWORD_ARGON2I);
                            
                            echo "<p>Tu contraseña ahora está cifrada de manera segura: " . $usuario['password'];
                        }
                    }
                
                    $jsonString = json_encode($arrayUsuarios, JSON_PRETTY_PRINT);
                    //file_put_contents($rutaJSON, $jsonString);
                    $fichero = fopen($rutaJSON, 'w');
                    fwrite($fichero, $jsonString);
                    fclose($fichero);
                }
            }
            
        ?>
    </body>
</html>

