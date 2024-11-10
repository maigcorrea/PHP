<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function corregir_primera_letra ( &$cad ){
            if(preg_match("'^[a-z]'", $cad)){
                $cad[0] = strtoupper($cad[0]);
            }
        }

        function corregir_mayusculas( &$cad ){
            corregir_primera_letra($cad);
            
            $tope = strlen($cad);
            for($i = 1; $i < $tope; $i++){
                if(preg_match("'[A-Z]'", $cad[$i])) $cad[$i] = strtolower($cad[$i]);
            }
        }

        if(isset($_POST["envio"])){ 
            corregir_mayusculas($_POST["texto"]);
            echo $_POST["texto"];
        }
        else{
    ?>
        <form action="#" method="post">
            <label for="texto">Introduce la cadena:</label>
            <input type="text" name="texto">
            <br>
            <input type="submit" value="Enviar" name="envio">
        </form>
    <?php } ?>
</body>
</html>