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
        function contar_Mayusculas($cad){
            $lon=strlen($cad);
            $cont=0;
            for($i=0;$i<$lon;$i++){
                if(preg_match("'[A-Z]'",$cad[$i])){
                    $cont++;
                }
            }
            return "Dentro de la cadena '$cad' hay $cont mayúsculas";
        }

        if(isset($_POST["env"])){
            echo(contar_Mayusculas($_POST["string"]));
        }
    ?>
</body>
</html>