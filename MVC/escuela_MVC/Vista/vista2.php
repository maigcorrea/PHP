<body>
    <form action="../Controlador/index.php" method="post">
        <label for="">Elige el alumno:</label><br>
        <select name="alum">
    <?php
        if(isset($alumnos)){
            foreach ($alumnos as $key => $value) {
                echo "<option value='$key'>$value[0]</option>";
            }
        }else{
            echo "No hay array";
        }
    ?>
        </select><br><br>
        <label for="nota">Introduce la nota</label><br>
        <input type="number" name="nota"><br><br>
        <input type="hidden" name="asignat" value=<?php if (isset($asignatura)) echo "$asignatura" ?>>

        <input type="submit" value="Poner_nota" name="action">
        <?php if(isset($mensaje)) echo "<p>$mensaje</p>"?>
    </form>
</body>