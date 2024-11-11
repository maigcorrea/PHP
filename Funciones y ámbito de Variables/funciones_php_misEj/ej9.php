<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="#" method="post" enctype="multipart/form-data">
        <label for="mes">Indica un mes</label><br>
        <input type="number" name="mes"><br>
        <select name="festivos" value="festivos">
        <option>Selecciona un color para los dias festivos</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="white">Blanco</option>
        </select>

        <select name="fines" value="fines">
            <option>Selecciona un color para los fines de semana</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="white">Blanco</option>
        </select>

        <select name="laborables" value="laborables">
        <option>Selecciona un color para los dias laborables</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="white">Blanco</option>
        </select><br>

        <input type="submit" name="env" value="Enviar">
    </form> -->
    <?php
        if(isset($_POST["env"])){
            function colorear($color,$num){
                echo "<td style=\"background-color:$color\">$num</td>";
            }

            //Saber por que dia de la semana comienza el mes
            $timeStampMes=mktime(0,0,0,$_POST["mes"],1,2024);
            $infoMes=getdate($timeStampMes);
            echo $infoMes["weekday"];

            //Saber el número de dias del mes
            $diasMes=date("t",$timeStampMes);
            echo "el mes tiene $diasMes dias";

            //Array con los festivos de cada mes
            $festivosEnero=[1,6];
            $festivosFebrero=[28];
            $festivosMarzo=[19];
            $festivosAbril=[1];
            $festivosJunio=[24];
            $festivosAgosto=[15];
            $festivosOctubre=[12];
            $festivosNoviembre=[1];
            $festivosDiciembre=[6,8,25];

            for($i=1;$i<$diasMes;$i++){
                $infoDiaActual=getdate(mktime(0,0,0,$_POST["mes"],$i,2024));
                if($infoDiaActual["weekday"]=="Saturday" && $infoDiaActual["weekday"]=="Sunday"){
                    //Si es fin de semana que se coloree del color seleccionado
                }
            }



            echo "<table>";



            echo "</table>";

        }else{
            echo '
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="mes">Indica un mes</label><br>
                    <input type="number" name="mes"><br>
                    <select name="festivos" value="festivos">
                    <option>Selecciona un color para los dias festivos</option>
                        <option value="red">Rojo</option>
                        <option value="blue">Azul</option>
                        <option value="green">Verde</option>
                        <option value="white">Blanco</option>
                    </select>

                    <select name="fines" value="fines">
                        <option>Selecciona un color para los fines de semana</option>
                        <option value="red">Rojo</option>
                        <option value="blue">Azul</option>
                        <option value="green">Verde</option>
                        <option value="white">Blanco</option>
                    </select>

                    <select name="laborables" value="laborables">
                    <option>Selecciona un color para los dias laborables</option>
                        <option value="red">Rojo</option>
                        <option value="blue">Azul</option>
                        <option value="green">Verde</option>
                        <option value="white">Blanco</option>
                    </select><br>

                    <input type="submit" name="env" value="Enviar">
                </form>
            
            
            ';
        }
    ?>
</body>
</html>