<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="nom">Nombre del Autor</label>
        <input type="text" name="nom" value=<?php if(isset($autor)) echo "$autor"; ?>>

        <br>
        <br>

        <input type="submit" value=<?php echo "$action" ?> name="action">
        <input type="submit" value="Volver" name="action">
    </form>
</body>
</html>