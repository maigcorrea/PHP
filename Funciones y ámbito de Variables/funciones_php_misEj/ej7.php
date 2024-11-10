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
         $form=$_POST;
        // function comprobarNotas($res){
        //     if($res!="nom" && $res!="env"){
        //         if(){

        //         }
        //     }
        // }
        function mostrar($nombre,$notas){
            echo "<table><tr><th>Alumno</th><th>$nombre</th></tr>";
            foreach ($notas as $key => $value) {              
                $mensaje="";
                if($value>=0 && $value<5){
                    $mensaje="Insuficiente";
                }else if($value==5){
                    $mensaje="Suficiente";
                }else if($value>5 && $value<7){
                    $mensaje="Bien";
                }else if($value>=7 && $value<=8){
                    $mensaje="Notable";
                }else{
                    $mensaje="Sobresaliente";
                }


                if($key!="nom" && $key!="env"){
                    echo "<tr><td>$key</td><td>$mensaje</td></tr>";
                }
            }
            echo "</table>";
        }


        mostrar($_POST["nom"],$_POST);
        
      }else{
        echo '
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="nom">Introduce tu nombre:</label><br>
                <input type="text" name="nom"><br>
                <label for="mates">Introduce tu nota de matemáticas:</label><br>
                <input type="number" name="mates" step="0.1"><br>
                <label for="lengua">Introduce tu nota de lengua:</label><br>
                <input type="number" name="lengua" step="0.1"><br>
                <label for="historia">Introduce tu nota de historia:</label><br>
                <input type="number" name="historia" step="0.1"><br>
                <label for="dibujo">Introduce tu nota de dibujo:</label><br>
                <input type="number" name="dibujo" step="0.1"><br>
                <input type="submit" name="env" value="Enviar">
            </form>
        ';
      }
    ?>
</body>
</html>