<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 4</title>
    </head>
    <body>
        
        <?php
            /* Se recogen los datos y se almacenan en un array, luego saluda al usuario por pantalla. */
            if(isset($_POST['enviar'])) {
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $usuario = array("Nombre" => $nombre, "Email" => $email, "Password" => $password);
                print("Bienvenido " . $usuario["Nombre"] . "!!");

            }else { 
            
        ?>
            <!-- Se comprueba con un pattern que los campos no estén vacíos -->
                <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <p>
                        <label>Nombre de usuario: </label>
                        <input type="text" name="nombre" pattern=".+"/>
                    </p> 

                    <p>
                        <label>E-mail: </label>
                        <input type="email" name="email" pattern=".+"/>
                    </p>
                    
                    <p>
                        <label>Contraseña: </label>    
                        <input type="password" name="password" pattern=".+"/>
                    </p>

                    <input type="submit" value="Enviar" name="enviar"/>
                </form>
    
            <?php
            } ?>
    </body>
</html>
