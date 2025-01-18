
<body>
    
    <form action="./controlador.php" method="post">
        <label for="">MÓDULOS</label><br>
        <?php
            if(isset($datos)){
                foreach ($datos as $key => $value) {
                    echo "<input type='checkbox' name='lib$key' value='$key'>$value[0]<br>";
                }
            }else{
                echo "<p>No hay array</p>";
            }
        ?> 
        <label for="">CURSOS</label><br>
    
        <?php
            if(isset($datos)){
                foreach ($datos as $key => $value) {
                    echo "<input type='checkbox' name='lib$key' value='$key'>$key º<br>";
                }
            }else{
                echo "<p>No hay array</p>";
            }
        ?> 
            <input type="submit" value="Calificar" name="action">
            <input type="submit" value="Ver" name="action">
        </form>
</body>
