
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
            <input type="submit" value="Calificar" name="action">
            <input type="submit" value="Ver" name="action">
        </form>
</body>
