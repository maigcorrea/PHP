<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        require_once "clases.php";

        $db=new mysqli('localhost','root','','kahoot');
        $db->set_charset("utf8");

    //  $preg=new preguntas($db);
    //  $preg->get_pregunta();

        //USUARIOS
        if(isset($_POST["env"])){
            $user=new usuarios($db,$_POST["nom"]);
            $user->insertarUsuarioTiempo();
            


        }else{
            echo '
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="nom">Indica tu nombre:</label><br>
                    <input type="text" name="nom" id=""><br>
                    <input type="submit" value="Enviar" name="env">
                </form>
            ';
    }
    ?>
</body>
</html>