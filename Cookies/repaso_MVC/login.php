<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?action=iniciar" method="post">
        <label for="nom">Nombre de usuario</label><br>
        <input type="text" name="nom" value=<?php if(isset($_COOKIE["usuario"])) echo $_COOKIE["usuario"]?>><br>  <!-- Para autocompletar el campo en caso de que haya una cookie -->

        <label for="psw">Contraseña</label><br>
        <input type="text" name="psw"><br>

        <!-- Casilla para cookies -->
        <input type="checkbox" name="rec" <?php if(isset($_COOKIE["usuario"])) echo "checked"?>> <!-- Para autocompletar el campo en caso de que se haya marcado previamente (en ese caso habrá una cookie)-->
        <label for="rec">Recordarme</label><br>

        <input type="submit" value="Enviar" name="fini">
    </form>

    <p>¿No tienes cuenta?<a href="index.php?action=registro">Registrarse</a></p>
</body>
</html>