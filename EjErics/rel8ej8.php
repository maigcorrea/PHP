<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function dif_fecha( string $fecha ){
            $timeFecha = strtotime($fecha);

            $arrTime = getdate();
            $timeHoy = mktime(0,0,0,$arrTime["mon"], $arrTime["mday"], $arrTime["year"]);

            $dif = ($timeHoy - $timeFecha)/(24*3600);

            return $dif;
        }

        if(isset($_POST["env"])){
            foreach($_POST as $key => $value){
                if(strstr($key, "nom")) echo "Nombre: $value<br>";

                if(preg_match("'^fecha'", $key)){
                   $dias = dif_fecha($value); 
                    $recargo = 0;

                    if($dias > 0) $recargo = $dias * 5; 

                    echo "Fecha: $value<br>Tiene un recargo de $recargo";
                }
            }

        }
        else{
        ?>
            <form action="#" method="post">
                <input type="text" name="nom1" placeholder="Introduce el nombre">
                <br>
                <label for="fecha">Introduce la fecha de pago:</label>
                <input type="date" name="fecha1">
                <br>
                <input type="submit" value="Enviar" name="env">
            </form>
    
    
        <?php } ?>
</body>
</html>