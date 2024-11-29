<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST["env"])){
        $pass = $_POST["pass"];
        $pass2 = $_POST["pass2"];

        if(strcmp($pass,$pass2) == 0){
            if(strlen($pass) >= 8 && strlen($pass) <= 20){
                $nom = $_POST["nom"];

                $bd = new mysqli('localhost', 'root', '', 'ej1');
                $consulta = "select * from usuario where nom='$nom';";

                if($res = $bd->query($consulta)){
                    if($res->num_rows == 0){
                        $consulta = "INSERT INTO usuario VALUES('$nom', '$pass');";
                        if($res = $bd->query($consulta)){
                            header("Location: inicioSes.php?acc=1");
                        }
                    }else{
                        header("Location:registro.php?err=1");
                    }


                }
            }
        }

    }else{ 
        if(isset($_GET["err"])){
            if($_GET["err"] == 1)
                echo '<p style="color:red;">El usuario ya está registrado</p>';
        }
        
        ?>
        

        <form action="#" method="post">
            <label for="nom">Nombre de usuario</label>
            <input type="text" name="nom">
            <br>
            <label for="pass">Contraseña</label>
            <input type="text" name="pass">
            <br>
            <label for="pass2">Repite contraseña</label>
            <input type="text" name="pass2">
            <br>
            <input type="submit" value="Enviar" name="env">
        </form>

    <?php } ?>
</body>
</html>