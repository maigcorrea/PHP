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
            return $cad;
        }

        $saludo="hola mundo";
        echo(corregir_primera_letra($saludo));

        //EJ 2
        function corregir_mayusculas(&$cad){
            corregir_primera_letra($cad);

            //Sacar la longitud de la cadena e ir recorriendola
            $tope=strlen($cad);
            for($i=1;$i<$tope;$i++){//Se empieza desde 1 porque la pos 0 es la primera letra(la que va en mayúscula)
                if(preg_match("'[A-Z]'",$cad[$i])){//Si la letra es mayúscula, se convierte a minúscula
                    $cad[$i]=strtolower($cad[$i]);
                }
            }
            return $cad;
        }

        $saludo="hoLA MunDo";
        echo(corregir_mayusculas($saludo));
    ?>
</body>
</html>