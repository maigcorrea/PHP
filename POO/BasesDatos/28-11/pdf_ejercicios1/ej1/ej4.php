<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 4. Crear un documento PHP que por medio de formularios permita al usuario -->
    <!-- introducir nuevos productos. -->

    <?php
        require_once "Clases.php";
        $db=new mysqli('localhost','root','','ejercicios_pdf');
        $db->set_charset("utf8");

        if(isset($_POST["env"])){
            $insProducto=new producto($db,"",$_POST["desc"],$_POST["prec"]);
            $insProducto->insertarProducto();
            header("Location:ej4.php?ver=1");
        }else{
            echo '
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="desc">Indica la descripcion del producto</label><br>
                    <input type="text" name="desc" id=""><br>
                    <label for="prec">Indica su precio</label><br>
                    <input type="text" name="prec" id=""><br>
                    
                    <input type="submit" value="Enviar" name="env">
                </form>
            ';
    
            if(isset($_GET["ver"])){
                if($_GET["ver"]==1) echo "<p style='color:green'>Producto insertado</p>";
            }
        }
    ?>
</body>
</html>