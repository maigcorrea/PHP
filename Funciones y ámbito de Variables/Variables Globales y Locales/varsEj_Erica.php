<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        function saludo(){ 

            static $cont=0;

            if(func_num_args() == 0){
                $nombre = $GLOBALS["nom"];
            }
            else if(func_num_args() == 1){
                $nombre = func_get_arg(0);
            } else if (func_num_args() == 2){
                $nombre = func_get_arg(0)." y ".func_get_arg(1);
            }

            echo "<br>Hola $nombre<br>";

            $cont++;
            echo "La función se ha ejecutado $cont veces<br>";
        }

        global $nom;

        $GLOBALS["nom"] = "Érica";

        saludo();

        saludo("Aguayo");

        saludo("Pepe", "Pacho");

    ?>
</body>
</html>