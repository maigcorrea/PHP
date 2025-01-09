<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Si la sesión está abierta, es decir tiene un valor (la sesión se almacenaba en $nUsu en index.php), se muestra el nombre del usuario, sino, sólo bienvenid@ -->
    <h1>Bienvenid@ <?php if(isset($nUsu)) echo $nUsu ?></h1>

    <!-- Botón para cerrar sesión -->
     <form action="index.php?action=cerrar" method="post">
        <input type="submit" value="Cerrar Sesión" name="cerr">
     </form>
</body>
</html>