<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .diaMarcado{
            background-color:green;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_POST["envio"])){
            $dia = $_POST["dia"];
            $mes = $_POST["mes"];
            $anio = $_POST["anio"];
            if(checkdate($mes, $dia, $anio)){
                if(isset($_POST["mesAnt"])){
                    $mesAnt = ($mes-1)%12;
                    $anioAnt = $anio;
                    if($mesAnt > $mes) $anioAnt--;

                    $time = strtotime("$anioAnt-$mesAnt-1");
                
                    $arrtime = getdate($time);
                    $diaSem = $arrtime["wday"];

                    $topeDia = intval(date("t", $time));

                    $totIter = $topeDia + $diaSem - 1;

                    echo $arrtime["month"];

                    echo "<table><tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>";

                    $contDia = 1;
                    for($i = 1; $i <= $totIter; $i++){
                        if($i%7 == 1) echo "<tr>";

                        if($i >= $diaSem){
                            echo '<td>'.$contDia++.'</td>';
                        }

                        else
                            echo "<td> </td>";

                        if($i % 7 == 0) echo "</tr>";
                    }
                }


                echo "</table>";



                $time = strtotime("$anio-$mes-1");
                
                $arrtime = getdate($time);
                $diaSem = $arrtime["wday"];

                $topeDia = intval(date("t", $time));

                $totIter = $topeDia + $diaSem - 1;

                echo $arrtime["month"];

                echo "<table><tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>";

                $contDia = 1;
                for($i = 1; $i <= $totIter; $i++){
                    if($i%7 == 1) echo "<tr>";

                    if($i >= $diaSem){
                        if($dia == $contDia) $cl = "diaMarcado";
                        else $cl = "";

                        echo '<td class="'.$cl.'">'.$contDia++.'</td>';
                    }

                       
                    else
                        echo "<td></td>";

                    if($i % 7 == 0) echo "</tr>";
                }
                echo "</table>";

                
                if(isset($_POST["mesSig"])){
                    $mesSig = ($mes+1)%12;
                    $anioSig = $anio;
                    if($mesSig < $mes) $anioSig++;

                    $time = strtotime("$anioSig-$mesSig-1");
                
                    $arrtime = getdate($time);
                    $diaSem = $arrtime["wday"];

                    $topeDia = intval(date("t", $time));

                    $totIter = $topeDia + $diaSem - 1;

                    echo $arrtime["month"];

                    echo "<table><tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>";

                    $contDia = 1;
                    for($i = 1; $i <= $totIter; $i++){
                        if($i%7 == 1) echo "<tr>";

                        if($i >= $diaSem){
                            echo '<td>'.$contDia++.'</td>';
                        }

                        else
                            echo "<td> </td>";

                        if($i % 7 == 0) echo "</tr>";
                    }
                }


                echo "</table>";

            } else header("Location: fechas3.php");
        }
        else{
    ?>
        <form action="#" method="post">
            <label for="dia">Introduce el dia:</label>
            <input type="number" name="dia">
            <br>
            <label for="mes">Introduce el mes:</label>
            <input type="number" name="mes">
            <br>
            <label for="anio">Introduce el dia:</label>
            <input type="number" name="anio">
            <br>
            <input type="checkbox" name="mesAnt" value=1>
            <label for="mesAnt">Ver el mes anterior</label>
            <br>
            <input type="checkbox" name="mesSig" value=1>
            <label for="mesSig">Ver el mes siguiente</label>
            <br>
            <input type="submit" value="Enviar" name="envio">
        </form>
    <?php } ?>

</body>
</html>