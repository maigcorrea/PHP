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
        // $result=$db->query('Select * from alumnos');

        //Crear sentencia
        $sentencia="SELECT a.* FROM alumnos a,matriculas m WHERE codigo=? AND anio=? AND a.dni=m.dni;";

        //Prpararla
        $consulta= $db->prepare($sentencia);//Devuelve un objeto del tipo mySQLli

        $cod=1;
        $an=2020;

        //Bindear los parametros Indico el tipo de los parámetros y los parámetros en sí
        $consulta->bind_param("ii",$cod,$an);

        //Bindear el resultado. Pasarle donde se van a guardar los resultados
        $consulta->bind_result($dni,$nom,$edad);

        $consulta->execute();

        while($consulta->fetch()){
            echo "El alumno $nom con dni $dni y edad $edad, se matriculo en la asignatura de codigo  en 2020";
        }

        $consulta->close();
    ?>
</body>
</html>