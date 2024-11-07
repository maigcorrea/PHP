<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="string">Indica una cadena</label>
        <input type="text" name="string">
        <label for="char">Indica una letra;</label>
        <input type="text" name="char">
        <label for="dist">Quieres distinguir entre mayúsculas y minúsculas?</label>
        <input type="text" name="dist">
        <input type="submit" name="env" value="Enviar">
    </form>
    <?php
        function contarLetra($cad,$letra,$sensitive="Si"){
            $apariciones;
            if($sensitive=="No"){
                $letraMin=strtolower($letra);
                $palMin=strtolower($cad);
                $apariciones=substr_count($palMin,$letraMin);
            }elseif($sensitive=="Si"){
                $apariciones=substr_count($cad,$letra);
            }

            return "Dentro de la cadena '$cad' la letra '$letra' tiene $apariciones";
        }

        if(isset($_POST["env"])){
            echo(contarLetra($_POST["string"],$_POST["char"],$_POST["dist"]));
        }
    ?>
</body>
</html>