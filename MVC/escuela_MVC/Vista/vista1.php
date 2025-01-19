
<body>
    <form action="../Controlador/index.php" method="post">
        <label for="modulo">MÓDULOS</label><br>
        <?php
            if(isset($datos)){
                foreach ($datos as $key => $value) {
                    echo "<input type='radio' name='modulo' value='$value[0]'>$value[0]<br>";
                }
            }else{
                echo "<p>No hay array</p>";
            }
        ?> 
        <label for="curso">CURSOS</label><br>
    
        <?php
            if(isset($datos)){
                foreach ($datos as $key => $value) {
                    echo "<input type='radio' name='curso' value='$key'>$key º<br>";
                }
            }else{
                echo "<p>No hay array</p>";
            }
        ?> 
            <input type="submit" value="Calificar" name="action">
            <input type="submit" value="Ver" name="action">
        </form>
</body>
