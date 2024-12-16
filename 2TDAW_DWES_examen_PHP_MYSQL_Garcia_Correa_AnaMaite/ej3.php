<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $bd=new MySqli("Localhost","root","","examen_biblio");
        if($bd){
            echo "Conexión establecida";
        }

        require_once "clases.php";
    ?>
</body>
</html>