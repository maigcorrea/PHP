<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "Clases.php";

        $db=new mysqli('localhost','root','','ejercicios_pdf');
        $db->set_charset("utf8");

        $cli=new cliente($db);

        $cli->get_datos();
    ?>
</body>
</html>