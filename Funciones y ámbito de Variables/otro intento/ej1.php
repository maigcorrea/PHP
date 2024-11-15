<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function corregir_primera_letra(&$cad){
            if(preg_match("'^[a-z]'",$cad)){
                $cad[0]=strtoupper($cad[0]);
            }
            echo $cad;
        }

        $saludo="hola mundo";
        corregir_primera_letra($saludo);
    ?>
</body>
</html>