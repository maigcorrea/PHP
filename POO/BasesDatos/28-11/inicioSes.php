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
            $nom = $_POST["nom"];
            $pass = $_POST["pass"];

            $bd = new mysqli('localhost', 'root', '', 'ej1');
            $consulta = "SELECT nom FROM usuario WHERE nom='$nom' AND pass='$pass';";

            echo $consulta;
            if($res = $bd->query($consulta)){
                if($res->num_rows == 1){
                    echo "Bienvenido, $nom";
                }else{
                    header("Location: inicioSes.php?err=1");
                }

            }
        }else{ 
            if(isset($_GET["acc"])){
                if($_GET["acc"] == 1)
                    echo '<p style="color:green;">Se ha registrado correctamente</p>';
            }
            if(Isset($_GET["err"])){
                if($_GET["err"] == 1)
                    echo '<p style="color:red;">Usuario o contraseña incorrectos</p>';
            }   
        ?>

        <form action="#" method="post">
            <label for="nom">Nombre de usuario</label>
            <input type="text" name="nom">
            <br>
            <label for="pass">Contraseña</label>
            <input type="text" name="pass">
            <br>
            <input type="submit" value="Enviar" name="env">
        </form>

        <?php } ?>
</body>
</html>