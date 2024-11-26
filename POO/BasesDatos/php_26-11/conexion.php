<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $db=new mysqli('localhost','root','','centro');
        $result=$db->query('Select * from alumnos');

        // echo $result->num_rows."<br>";

        $fila=$result->fetch_array(MYSQLI_ASSOC);


        // while($fila!=null){
        //     foreach ($fila as $key => $value) {
        //         echo "$key:$value<br>";
        //     }

        //     $fila=$result->fetch_array(MYSQLI_ASSOC);
        // }


        $matriz=$result->fetch_all(MYSQLI_ASSOC);
        foreach ($matriz as $filas) {
            foreach ($filas as $columna => $valor) {
                echo "$columna:$valor<br>";
            }
        }

        $db->close();
    ?>
</body>
</html>