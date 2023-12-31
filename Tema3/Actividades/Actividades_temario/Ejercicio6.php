<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 6</title>
    </head>
    <body>
        <form action=" <?php echo $_SERVER['PHP_SELF']; ?> " method="post">
            <p>
                <label>Ciclos que has cursado:</label>
                <input type="checkbox" name="check[]" value="DAM">DAM
                <input type="checkbox" name="check[]" value="DAW">DAW
                <input type="checkbox" name="check[]" value="ASIR">ASIR
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['check'])){
                        echo "<span style='color:red'>--&lt; Debe seleccionar al menos un ciclo!!</span>";
                    }
                ?>
            </p>
            <p>
                <label>Asignatura preferida:</label>
                <input type="radio" name="radio" value="DWES">DWES
                <input type="radio" name="radio" value="DWEC">DWEC
                <input type="radio" name="radio" value="DIW">DIW
                <input type="radio" name="radio" value="DAW">DAW
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['radio'])){
                        echo "<span style='color:red'>--&lt; Debe seleccionar una asignatura!!</span>";
                    }
                ?>
            </p>
            <p>
                <label>Selecciona tu instituto:</label>
                <select name="instituto" required>
                    <option value="" selected>Selecciona un instituto</option>
                    <option value="CIFP Nº1 Ceuta">CIFP Nº1 Ceuta</option>
                    <option value="I.E.S. Siete Colinas">I.E.S. Siete Colinas</option>
                </select>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['instituto'])){
                        echo "<span style='color:red'>--&lt; Debes seleccionar tu instituto!!</span>";
                    }
                ?>
            </p>
            <p>
                <label>Selecciona tu color favorito</label>
                <input type="color" id="favColor" name="favColor" required>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['favColor'])){
                        echo "<span style='color:red'>--&lt; Selecciona tu color favorito!!</span>";
                    }
                ?>
            </p>            
            <p>
                <label>Fecha de inicio de clases</label>
                <input type="date" id="fechaInicio" name="fechaInicio" required>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['fechaInicio'])){
                        echo "<span style='color:red'>--&lt; Introduce tu fecha de inicio!!</span>";
                    }
                ?>
            </p>
            <p>
                <label>Elige cuántos días quieres asistir a clases 0-365</label>
                <input type="number" name="diasClase" min="0" max="365" required>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['diasClase'])){
                        echo "<span style='color:red'>--&lt; Debe decir cuantos días quiere ir a clase!!</span>";
                    }
                ?>
            </p>
            <p>
                <label>Ganas de empezar</label>
                <input type="range" name="motivacion" min="0" max="100" required>
                <?php 
                    if(isset($_POST['enviar']) && empty($_POST['motivacion'])){
                        echo "<span style='color:red'>--&lt; Indica tus ganas de empezar!!</span>";
                    }
                ?>
            </p>
            <p>
                <label>Campo oculto</label>
                <input type="hidden" name="oculto">
            </p>

            <input type="submit" name="enviar" value="Enviar">

        </form>

        <?php
            include_once('./Ejercicio11.inc.php');

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])){
                $ciclos = "";

                foreach ($_POST['check'] as $valor){
                    $ciclos .= $valor .', ';
                }
                
                echo 'Los ciclos que has cursado son ' . $ciclos;
                echo '<br>Tu asignatura favorita es ' . $_POST['radio'];
                echo '<br>Tu instituto es ' . $_POST['instituto'];
                echo '<br>Tu color favorito es el ' . $_POST['favColor'];
                echo '<br>Las clases comienzan el día ' . $_POST['fechaInicio'];
                echo '<br>Quiero asistir ' . validarDatos($_POST['diasClase']) . ' días a clase';
                echo '<br>Mis ganas de empezar son ' . $_POST['motivacion'] . ' sobre 100';
                echo $_POST['oculto'];
            }
        ?>
    </body>
</html>