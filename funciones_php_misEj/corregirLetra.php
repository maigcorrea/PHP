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

    // function corregirLetra($palabra){
    //     $palabra[0]=strtoupper($palabra[0]);
    //     return $palabra;
    // }

    function corregirLetra(&$palabra){
        if(preg_match("'^[a-z]'",$palabra)){
            $palabra[0]=strtoupper($palabra[0]);
        }
    }

        if(isset($_POST["env"])){
            corregirLetra($_POST["string"]);
            echo $_POST["string"];
        }
    ?>

</body>
</html>