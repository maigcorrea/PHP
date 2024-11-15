<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "rel8ej11.php";


        if(isset($_POST["env"])){
            if(empty($_FILES["arch2"]["tmp_name"])){
                funcion_principal($_POST["nom"], $_FILES["arch1"]);
            }else{
                funcion_principal($_FILES["arch1"], $_FILES["arch2"]);
            }
        }else{ ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <input type="text" name="nom" placeholder="Introduce el nombre">
                <br>
                <input type="file" name="arch1">
                <br>
                <input type="file" name="arch2">
                <input type="submit" value="Enviar" name="env"> 
            </form>

        <?php } ?>
</body>
</body>
</html>