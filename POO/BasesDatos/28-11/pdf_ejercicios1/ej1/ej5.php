<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="#" method="post" enctype="multipart/form-data">
        <label for="cliente">Selecciona el cliente</label>
        <select name="cliente" id="">
            <option value="algo">loqsea</option>
        </select>
    </form> -->
    <?php
        // 5. Crear un documento PHP que por medio de formularios permita al usuario
        // insertar una nueva venta. El usuario se encontrará con una lista desplegable
        // para el cliente, otra para el producto, un campo “date” para elegir la fecha de
        // la venta y un campo de texto para introducir la cantidad vendida. Por defecto,
        // todas las ventas se insertan como no pagadas.
        // NOTA: las listas desplegables deben crearse también con PHP para que sean
        // dinámicas

        require_once "Clases.php";
        $db=new mysqli('localhost','root','','ejercicios_pdf');
        $db->set_charset("utf8");


        $cli=new cliente($db);
        $cli->sacarNomCliente();
    ?>
</body>
</html>