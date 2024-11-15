<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function limpiar_chars( string $str, string $c, $lado=-1){
            if(strlen($c) == 1){
                $check = "";
                $ini = 0;
                $fin = 0;
                $l1 = 1;

                if($lado == -1 || $lado == 0){
                    $check = "'^$c'";
                    $ini = 1;
                    $fin = strlen($str);
                } 
                else if ($lado == 1){
                    $check = "'$c$'";
                    $ini = 0;
                    $fin = strlen($str)-1;
                } 

                if(preg_match($check, $str))
                    return limpiar_chars(substr($str, $ini, $fin), $c, $lado);
                else if($lado == 0)
                    return limpiar_chars($str, $c, $l1);
                else
                    return $str;

            }
        }

        echo limpiar_chars("____hola___", "_", 0);
    ?>
</body>
</html>