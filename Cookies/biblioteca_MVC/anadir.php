<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($arrLibros)){
            foreach ($arrLibros as $key => $value) {
                echo $value[0]."<br>";
            }
        }
    ?>

    <form action="./controlador.php" method="post">
        <label for="nombre">Indica el nombre del libro:</label><br>
        <input type="text" name="nombre" id=""><br>
        <select name="" id="">
        <?php
            if(isset($arrLibros)){
                foreach ($arrLibros as $key => $value) {
                    echo "<option value='$value[2]'>$value[1]</option>";
                }
            }
        ?>
        </select><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>