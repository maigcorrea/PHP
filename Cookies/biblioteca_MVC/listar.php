<?php
    require_once("cabecera.html");
?>
<body>
    <form action="./controlador.php" method="post">
    <?php
        
        if(isset($arrLibros)){
            foreach ($arrLibros as $key => $value) {
                echo "<input type='checkbox' name='lib$key' value='$key'>$value[0]<br>";
            }
        }else{
            echo "Error. No hay array";
        }
    ?>
        <input type="submit" value="Borrar" name="action">
        <input type="submit" value="Modificar" name="action">
        <input type="submit" value="Añadir" name="action">
    </form>

    <?php
        if(isset($mensaje)){
            $mensaje;
        }
        // if (isset($mensaje)){
        //     if($mensaje=="corr") echo "<p>Borrado correctamente</p>";
        //     if($mensaje=="err") echo "<p>Error al borrar el libro</p>";
        // }
    ?>
    
</body>
<?php
    require_once("pie.html");
?>
