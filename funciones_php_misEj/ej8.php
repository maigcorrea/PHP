<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                
                
    <?php
        if(isset($_POST["env"])){
            function calcularDias($fPost){
                $fecha= $fPost;
                $timestamp=strtotime($fecha);

                $fechaActual=time();

                $diferenciaSeg=$fechaActual-$timestamp;
                $dias=round($diferenciaSeg/86400);
                // echo "<br>".$dias;

                $multa=$dias*5;
                if($multa<=0){
                    $multa=0;
                }
                return $multa;
            }

        calcularDias($_POST["fecha"]);  


        function mostrarDatos($datos){
            echo "<table><tr><th>Nombre</th><th>Fecha de pago</th><th>Recargo</th></tr>";
                
                    echo "<tr><th>".$datos["nom1"]."</th><td>".$datos["f1"]."</td><td>".calcularDias($datos["f1"])."</td></tr>";   
                    echo "<tr><th>".$datos["nom2"]."</th><td>".$datos["f2"]."</td><td>".calcularDias($datos["f2"])."</td></tr>";
                    echo "<tr><th>".$datos["nom3"]."</th><td>".$datos["f3"]."</td><td>".calcularDias($datos["f3"])."</td></tr>";  
            echo "</table>";
        }

        mostrarDatos($_POST);
        }else{
            echo '
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="fecha">Introduce una fecha:</label><br>
                    <input type="date" name="fecha"><br>

                    <label for="nom1">Introduce el nombre del primer usuario:</label><br>
                    <input type="text" name="nom1"><br>
                    <label for="f1">Introduce su fecha límite de pago:</label><br>
                    <input type="date" name="f1"><br>

                    <label for="nom2">Introduce el nombre del primer usuario:</label><br>
                    <input type="text" name="nom2"><br>
                    <label for="f2">Introduce su fecha límite de pago:</label><br>
                    <input type="date" name="f2"><br>

                    <label for="nom3">Introduce el nombre del primer usuario:</label><br>
                    <input type="text" name="nom3"><br>
                    <label for="f3">Introduce su fecha límite de pago:</label><br>
                    <input type="date" name="f3"><br>

                    <input type="submit" value="Enviar" name="env">
                </form>
            ';
        }
    ?>
</body>
</html>