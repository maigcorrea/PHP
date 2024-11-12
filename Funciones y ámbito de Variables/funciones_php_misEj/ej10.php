<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        function mostrarBoletin($arr){
            $media=($arr["nota1"]+$arr["nota2"]+$arr["nota3"])/3;
            echo "<table><tr><th>Nombre y apellidos</th><td>".$arr["nombre"]." ".$arr["apellidos"]."</td></tr>";
            for($i=1;$i<=3;$i++){
                foreach ($arr as $key => $value) {
                    if($key=="nota".$i){
                        echo "<tr><th>$key</th><td>$value</td></tr>";
                    }
                }
            }
            echo "<tr><th>Nota media</th><td>$media</td></tr>";
            echo "</table>";
        }
        

        if(isset($_POST["env"])){   
            $nombre=array("nombre"=>$_POST["nombre1"],"apellidos"=>$_POST["apellidos1"],"nota1"=>$_POST["nota1"],"nota2"=>$_POST["nota2"],"nota3"=>$_POST["nota3"]);
            mostrarBoletin($nombre);
            $nombre=array("nombre"=>$_POST["nombre2"],"apellidos"=>$_POST["apellidos2"],"nota1"=>$_POST["nota4"],"nota2"=>$_POST["nota5"],"nota3"=>$_POST["nota6"]);
            mostrarBoletin($nombre);
            
        }else{
            echo '
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="nombre1">Introduce tu nombre</label><br>
                    <input type="text" name="nombre1" id=""><br>
                    <label for="apellidos1">Introduce tu apellido</label><br>
                    <input type="text" name="apellidos1" id=""><br>
                    <label for="nota1">Introduce la nota del primer examen</label><br>
                    <input type="number" name="nota1" step="0.1" id=""><br>
                    <label for="nota2">Introduce la nota del segundo examen</label><br>
                    <input type="number" name="nota2" step="0.1" id=""><br>
                    <label for="nota3">Introduce la nota del tercer examen</label><br>
                    <input type="number" name="nota3" step="0.1" id=""><br>


                    <label for="nombre2">Introduce tu nombre</label><br>
                    <input type="text" name="nombre2" id=""><br>
                    <label for="apellidos2">Introduce tu apellido</label><br>
                    <input type="text" name="apellidos2" id=""><br>
                    <label for="nota4">Introduce la nota del primer examen</label><br>
                    <input type="number" name="nota4" step="0.1" id=""><br>
                    <label for="nota5">Introduce la nota del segundo examen</label><br>
                    <input type="number" name="nota5" step="0.1" id=""><br>
                    <label for="nota6">Introduce la nota del tercer examen</label><br>
                    <input type="number" name="nota6" step="0.1" id=""><br>
                    <input type="submit" name="env" value="Enviar">
                </form>
            ';
        }

    ?>
</body>
</html>