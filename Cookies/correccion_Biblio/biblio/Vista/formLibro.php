<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <?php if(isset($libro)) echo '<input type="number" name="id" value="'.$libro['id'].'" hidden>' ?>
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" value=<?php if(isset($libro)) echo "'".$libro['titulo']."'"; ?>>
        <br>
        <br>
        <label for="autor">Autor</label>
        <select name="autor">
            <?php if(!isset($libro)) echo '<option value="-">Selecciona un autor</option>';

                foreach($autores as $id=>$aut){
                    $opt = "";

                    if(isset($libro) && $libro['autor'] == $id)
                        $opt = "selected";

                    echo "<option value=$id $opt>$aut</option>";
                }

            ?>

        </select>
        <br>
        <br>
        <?php if(isset($libro)){ ?>
            <input type="checkbox" name="estado" value=1 <?php if(isset($libro)) echo 'checked'; ?>>
            <label for="estado">Disponible</label>
            <br>
            <br>
        <?php } ?>  
        <input type="submit" value=<?php echo "$action" ?> name="action">
        <input type="submit" value="Volver" name="action">
    </form>
</body>
</html>