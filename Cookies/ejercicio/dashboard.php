<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("eliminar.php");
        if(isset($_COOKIE["usuario"])){
            echo "Bienvenido/a ". $_COOKIE["usuario"];
        }else{
            echo "Bienvenido/a. No tienes la cookie";
        }
        

        if(isset($_POST["cerrar"])){
            cerrar();
        }else{
    ?>
    <form action="#" method="post">
        <input type="submit" value="Cerrar Sesión" name="cerrar">
    </form>
    <?php
        }
    ?>
</body>
</html>