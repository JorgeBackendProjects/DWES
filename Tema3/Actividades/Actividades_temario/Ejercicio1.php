<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <!-- En este bloque PHP se envían los datos obtenidos del formulario que se
        encuentra más abajo cuando el valor que se obtiene de la función isset() es
        igual a true, esto indica que el valor de la variable que contiene es distinto 
        de null. En caso contrario devuelve false y pasa a ejecutar el else. El botón
        'enviar'recoge y almacena los datos del formulario.
    
        En este caso siempre se ejecutará primero el else ya que al ejecutar la aplicación
        la variable no tiene valor, por lo tanto devuelve otro valor distinto a true. 
    
        El bloque PHP se cierra después de abrir la llave del else y en su bloque se carga
        un formulario HTML.
    
        Cuando se ejecute el bloque contenido en el if este recogerá mediante dos variables
        los valores introducidos en el formulario mediante la variable $_POST en este caso
        ya que es el método de envío que hemos seleccionado en el formulario. Este almacena
        los valores del formulario, y de todos sus elementos, de manera que se puede acceder
        a ellos mediante posiciones del array indicando el 'name' o 'id' de los input. Este 
        método envía los datos de forma no visible en la URL del sitio web /aplicación.
        
        Mediante un bucle for recorre los valores recogidos de los checkbox, para en caso de ser 
        más de uno que se muestren todos. Mediante un print se muestran los valores introducidos.-->
        <?php
            include_once("./Ejercicio11.inc.php");

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
                $nombre = validarDatos($_POST['nombre']);
                
                if(preg_match("/[A-Za-z\s]{3,}/", $nombre)){
                    $modulos = $_POST['modulos'];

                    print "<p>Nombre del alumno: " . $nombre . "</p>";
                    
                    foreach ($modulos as $modulo) {
                        print "<p>Modulo: " . $modulo . "</p>";
                    }
                }
            }else { 
            
        ?>
                <!-- El formulario tiene en el atributo 'action' la ruta al archivo donde se enviarán los datos, 
                en este caso al indicar la variable $_SERVER con la posición 'PHP_SELF' enviará los datos a la 
                misma aplicación donde se encuentra el formulario HTML. Después con el atributo 'method' indicamos
                el método de envío con el que va a operar el formulario. -->
                <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <p>
                        <label>Nombre del alumno:</label>
                        <input type="text" name="nombre" required/>
                        <?php 
                            if(isset($_POST['enviar']) && empty($_POST['nombre'])){
                                echo "<span style='color:red'>--&lt; Debe introducir un nombre!!</span>";
                            }
                        ?>
                    </p> 

                    <p>
                        <label>Módulos que cursa:
                            <input type="checkbox" name="modulos[]" value="DWEC">
                            Desarrollo web en entorno cliente 
                            <input type="checkbox" name="modulos[]" value="DWES">
                            Desarrollo web en entorno servidor
                            <input type="checkbox" name="modulos[]" value="DIW">
                            Diseño de interfaces web
                            <input type="checkbox" name="modulos[]" value="DAW">
                            Despliegue de aplicaciones web
                        </label>
                        <?php 
                            if(isset($_POST['enviar']) && empty($_POST['modulos'])){
                                echo "<span style='color:red'>--&lt; Debe seleccionar al menos un módulo!!</span>";
                            }
                        ?>
                    </p>
            
                    <p>
                        <input type="submit" value="Enviar" name="enviar"/>      
                    </p>                
                </form>
            
            <!-- Este bloque PHP se usa para cerrar la llave del bloque else. -->
            <?php
            } ?>
    </body>
</html>

