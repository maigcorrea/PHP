<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once("./class.articulo.php");

        // $a1=new ArticuloRebajado("Bicicleta",352.10,20);
        // echo $a1->strPadre();
        // echo "<br>El precio del artículo rebajado es: <br>".$a1->precioRebajado()."€";

        if(isset($_POST["env"])){
            $a2=new ArticuloRebajado($_POST["art"],$_POST["p"],$_POST["desc"]);
            echo $a2->__toString();
            echo "<br><br>El precio del artículo rebajado es: <br>".$a2->precioRebajado()."€";
        }else{
            echo '
                <form action="#" method="post" enctype="multipart/form-data">
        <label for="art">Introduce el nombre de un artículo:</label><br>
        <input type="text" name="art" id=""><br>
        <label for="p">Introduce su precio:</label><br>
        <input type="text" name="p"><br>
        <label for="desc">Introduce el porcentaje de rebaja:</label><br>
        <input type="text" name="desc" id="">

        <input type="submit" value="Enviar" name="env">
    </form>
            ';
        }
    ?>
    
</body>
</html>