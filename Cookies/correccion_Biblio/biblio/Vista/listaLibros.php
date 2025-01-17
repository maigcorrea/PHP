<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../Controlador/index.php" method='POST'>
        <input type="text" name="tipo" value=<?php if(isset($tipo)) echo "$tipo"; ?> hidden>

        <table>
            <tr><th> <?php if(isset($tipo)) echo $tipo; ?> </th></tr>
            <?php 
                foreach($lista as $id=>$value){
                    echo '<tr><td><input type="checkbox" name="lib'.$id.'" value="'.$id.'"> '.$value.'</td></tr>';
                }
            ?>
        </table>

        <?php if(isset($err)) echo $err; ?>

        <br>

        <input type="submit" name="action" value="Borrar">
        <input type="submit" name="action" value="Modificar">
        <input type="submit" name="action" value="Añadir">
        <input type="submit" name="action" value=<?php if(isset($tipo) && strcmp($tipo, "Autores")==0) echo "Volver"; else echo "Autores";?>>
    </form>
</body>
</html>