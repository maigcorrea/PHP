<body>
    <?php if(isset($err)) echo $err; ?>
    <form action="index.php?action=registrar" method="post">
        <label for="nom">Nombre de usuario</label><br>
        <input type="text" name="nom" ><br> 

        <label for="psw">Contraseña</label><br>
        <input type="text" name="psw"><br>

        <label for="psw2">Repite la contraseña</label><br>
        <input type="text" name="psw2"><br>

        <input type="submit" value="Enviar" name="fReg">
    </form>
    <!-- Ponemos sólo index.php porque si no existe el action, automaticamente se manda al login -->
    <p>¿Ya tienes cuenta?<a href="index.php">Login</a></p>
    
</body>