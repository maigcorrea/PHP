<?php
    // if(isset($_COOKIE["usuario"])){
    //     header("Location:./dashboard.php");
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "./comprobar.php";

        try{
            $db=new mysqli('localhost','root','','cookies');
            $db->set_charset("utf8");
        }catch(Exception $e){
            echo "Error";
        }

        if(isset($_POST["init"])){
            comprobarBD($db);
            
        }else{
    ?>
            <form action="#" method="post" enctype="multipart/form-data">
                <input type="text" name="user" id="" placeholder="Indica tu usuario" required><br>
                
                <div class="password-field">
                    <input type="text" name="password" id="" placeholder="Indica tu contraseña" required>
                    <i class="material-symbols-outlined eye">
            
                    </i>
                </div><br>

                Recordar usuario<input type="checkbox" name="cookies" id=""><br>


                <input type="submit" value="Iniciar Sesión" name="init">
            </form>
    <?php
        }

        if(isset($_GET["mensaje"])){
            if($_GET["mensaje"]==1) echo "<p>El usuario no se encuentra registrado.</p>";
            if($_GET["mensaje"]==2) echo "<p>La contraseña es incorrecta.</p>";
        }
    ?>
    <script src="./js/app.js"></script>
</body>
</html>