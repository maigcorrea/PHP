
<body>
    <form action="../Controlador/index.php" method="post">
        <label for="modulo">MÓDULOS</label><br>
        <?php
            if(isset($datos)){
                foreach ($datos['modulos'] as $value) {
                    echo "<input type='radio' name='modulo' value='$value'>$value<br>";
                }
            }else{
                echo "<p>No hay array de modulos</p>";
            }
        ?> 
        <label for="curso">CURSOS</label><br>
    
        <?php
            if(isset($datos)){
                foreach ($datos['cursos'] as $value) {
                    echo "<input type='radio' name='curso' value='$value'>$value º<br>";
                }
            }else{
                echo "<p>No hay array</p>";
            }
        ?> 


    <?php
        if(isset($datosAsig)){
            echo '<label for="">Elige la Asignatura:</label><br>
                    <select name="asig">';
            foreach ($datosAsig as $key => $value) {
                echo "<option value='$key'>$value</option>";
            }
            echo "</select><br>";
            ?>
            <input type="submit" value="Calificar" name="action">
            <input type="submit" value="Ver_expediente" name="action">
            <input type="hidden" name="modulo" value="<?php if(isset($modulo)) echo $modulo; ?>">
        
        <?php
        }else{
            echo '<input type="submit" value="asignaturas" name="action">';
        }
    ?><br>
            
            
        </form>
</body>
