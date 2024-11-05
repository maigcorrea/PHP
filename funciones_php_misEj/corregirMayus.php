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
        function corregir_mayus(&$cad){
            $cad[0]=strtoupper($cad[0]);
            $lon=strlen($cad);

            for($i=1;$i<$lon;$i++){
                if(preg_match("'[A-Z]'",$cad[$i])){
                    $cad[$i]=strtolower($cad[$i]);
                }
            }

        }

        if(isset($_POST["env"])){
            corregir_mayus($_POST["string"]);
            echo $_POST["string"];
        }
    ?>
</body>
</html>