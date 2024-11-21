<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "objetos.php";

        

        if(isset($_POST["env"])){
            $v1 = new Vehiculo($_POST["n1"], $_POST["t1"], $_POST["p1"]);
            $v2 = new Vehiculo($_POST["n2"], $_POST["t2"], $_POST["p2"]);

            if($v1->__get("tipo") != $v2->__get("tipo"))
                echo "Los vehículos no se pueden comparar";
            else{
                if($v1->__get("peso") > $v2->__get("peso"))
                    echo "El vehiculo 1 pesa más";
                else if($v1->__get("peso") < $v2->__get("peso"))
                    echo "El vehiculo 2 pesa más";
                else
                    echo "Los 2 vehiculos pesan igual";
            }


        }else{
            echo '<form action="#" method="post">';
            for($i = 1; $i <= 2; $i++){
                echo "Vehiculo $i";
                echo '<br>';
                echo '<label for="n'.$i.'"></label>';
                echo '<input type="text" name="n'.$i.'">';
                echo '<br>';

                echo '<select name="t'.$i.'">';
                echo '<option value="C">Camion</option>';
                echo '<option value="M">Moto</option>';
                echo '<option value="T">Turismo</option>';
                echo '</select>';
                echo '<br>';

                echo '<label for="p'.$i.'"></label>';
                echo '<input type="number" name="p'.$i.'">';
                echo '<br>';
                echo '<br>';
            }
            echo '<input type="submit" value="Enviar" name="env">';

            echo ' </form>';
        }
        

    ?>
</body>
</html>