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

    if(isset($_POST["env"])){
        $insCliente=new cliente($db,$_POST["nif"],$_POST["nom"],$_POST["edad"],$_POST["usuario"],$_POST["pass"]);
        $insCliente->insertarCliente();
        header("Location:ej3.php?ver=1");
    }else{
        echo '
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="nif">Indica tu nif</label><br>
                <input type="text" name="nif" id=""><br>
                <label for="nom">Indica tu nombre</label><br>
                <input type="text" name="nom" id=""><br>
                <label for="edad">Indica tu edad</label><br>
                <input type="number" name="edad" id=""><br>
                <label for="usuario">Indica tu nombre de usuario</label><br>
                <input type="text" name="usuario" id=""><br>
                <label for="pass">Indica tu contraseña:</label><br>
                <input type="text" name="pass" id=""><br>
                <input type="submit" value="Enviar" name="env">
            </form>
        ';

        if(isset($_GET["ver"])){
            if($_GET["ver"]==1) echo "<p style='color:green'>Cliente insertado</p>";
        }
    }
?>
</body>
</html>