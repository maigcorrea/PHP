<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="cad">Introduce una cadena de texto</label>
        <input type="text" name="cad">
        <label for="char">Selecciona un caracter de la cadena</label>
        <input type="text" name="char">
        <select name="desp" id="">
            <option value="izda">Izquierda</option>
            <option value="dcha">Derecha</option>
            <option value="ambos">Ambos</option>
        </select>
        <input type="submit" value="Enviar" name="emv">
    </form>
    <?php
        if(isset($_POST["env"])){
            if(strlen($_POST["char"])!=1){
                echo "Esto no es sólo un caracter";
            }else{
                if(strstr($_POST["cad"],$_POST["char"])){
                    
                }
            }
        }else{

        }
    ?>
</body>
</html>