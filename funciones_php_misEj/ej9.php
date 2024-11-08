<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <?php
        if(isset($_POST["env"])){
            function colorear($color,$num){
                echo "<td style=\"background-color:$color\">$num</td>";
            }

        }else{

        }
    ?>
</body>
</html>