<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once "clases.php";

        try{
            $db=new mysqli('localhost','root','','kahoot');
            $db->set_charset("utf8");
        }catch(Exception $e){
            header("Location:formulario.php?mensaje=0");
        }
        

    
        
        //USUARIOS
        if(isset($_POST["env"])){
            //Se inserta el usuario
            $user=new usuarios($db,$_POST["nom"]);
            $user->insertarUsuarioTiempo();

            $preg=new preguntas($db);           
            $preg->get_pregunta();

            //Salen las preguntas
        }else if(!isset($_POST['env1'])){
            echo '
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="nom">Indica tu nombre:</label><br>
                    <input type="text" name="nom" id=""><br>
                    <input type="submit" value="Enviar" name="env">
                </form>
            ';
        }


        if(isset($_POST['env1'])){
            $preg = new preguntas($db, $_POST['codPA'], $_POST['pMostradas']);

            if($preg->comprobarRespuesta($_POST['res']))
                $preg->get_pregunta();
        }

        // if(isset($_POST["env".$preg->get_cod()])){
        //     if($preg->comprobarRespuesta($_POST['res'],$_POST['codPreguntaActual'])){
        //         //Pasar a la siguiente pregunta
        //     }else{
        //         //Repetir pregunta
        //     }
        // }

        // if(isset($_POST["env1"]) && !isset($_POST["env"])){
        //     $preg1=new preguntas($db);
        //     $preg1->get_pregunta();
        // }else if(isset($_POST["env"])){
        //     $preg=new preguntas($db);
        //     $preg->get_pregunta();
        // }


        if(isset($_GET["mensaje"])){
            if($_GET["mensaje"]==0) echo "<p class='errBd'>Error de conexión con la Base de Datos</p>";
            // if($_GET["mensaje"]==1) echo "<p class='msjExitoUsuario'>Usuario registrado correctamente</p>";
            if($_GET["mensaje"]==2) echo "<p class='errYaRegistrado'>Error. El usuario ya está presente en la Base de Datos</p>";
            if($_GET["mensaje"]==3) echo "<p class='errUser'>El input está vacío</p>";
        }
    ?>
</body>
</html>