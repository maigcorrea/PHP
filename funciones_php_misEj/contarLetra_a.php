<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="text" name="string">
        <input type="submit" name="env" value="Enviar">
    </form>

    <?php
        function contarLetra_a($cad){
            $lon=strlen($cad);
            // for($i=0;$i<$lon;$i++){ No hace tener en cuenta las mayusculas, asi que no hacefalta pasarlo todo a minuscula
            //     $cad[$i]=strtolower($cad[$i]);
            // }

            $apariciones=substr_count($cad,"a");
            return "En  la cadena '$cad' la letra 'a' aparece $apariciones veces";
        }

        if(isset($_POST["env"])){
            echo(contarLetra_a($_POST["string"]));
        }
    ?>
</body>
</html>