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

     try{
         $db=new mysqli('localhost','root','','kahoot');
         $db->set_charset("utf8");
     }catch(Exception $e){
         header("Location:formulario.php?mensaje=0");
     }


     if (isset($_POST["env"])) {
        // Se inserta el usuario
        $user = new usuarios($db, $_POST["nom"]);
        $user->insertarUsuarioTiempo();
        echo "Usuario registrado. Ahora empezarás el cuestionario.";
    
        // Iniciar el objeto de preguntas
        $preguntaObj = new preguntas($db);
    
        // Array de preguntas mostradas
        $preguntasMostradas = []; // Inicializamos el array de preguntas mostradas
    
        // Recuperar una pregunta aleatoria
        if (isset($_POST['pMostradas'])) {
            // Convertimos la cadena de preguntas mostradas en un array
            $preguntasMostradas = explode(',', $_POST['pMostradas']);
        }
    
        $preguntaAleatoria = $preguntaObj->generar_preg_Aleatoria($preguntasMostradas);
    
        // Mostrar la pregunta
        echo $preguntaObj->mostrar_pregunta($preguntaAleatoria);
    
    } else {
        echo '
            <form action="#" method="post">
                <label for="nom">Indica tu nombre:</label><br>
                <input type="text" name="nom" id=""><br>
                <input type="submit" value="Enviar" name="env">
            </form>
        ';
    }
    
    if (isset($_GET["mensaje"])) {
        if ($_GET["mensaje"] == 0) echo "<p class='errBd'>Error de conexión con la Base de Datos</p>";
        if ($_GET["mensaje"] == 2) echo "<p class='errYaRegistrado'>Error. El usuario ya está presente en la Base de Datos</p>";
    }

    // // //REGISTRO
    // if(isset($_POST["env"])){
    //     //Se inserta el usuario
    //     $user=new usuarios($db,$_POST["nom"]);
    //     $user->insertarUsuarioTiempo();
    //     echo "registrado";

    //     //Aquí saldrían las preguntas pero no he conseguido que funcione, asi que solo téngo hasta el registro
    // }else{
    //     echo '
    //         <form action="#" method="post" enctype="multipart/form-data">
    //             <label for="nom">Indica tu nombre:</label><br>
    //             <input type="text" name="nom" id=""><br>
    //             <input type="submit" value="Enviar" name="env">
    //         </form>
    //     ';
    // }
    




    // //MENSAJES DE ERROR
    // if(isset($_GET["mensaje"])){
    //     if($_GET["mensaje"]==0) echo "<p class='errBd'>Error de conexión con la Base de Datos</p>";
    //     // if($_GET["mensaje"]==1) echo "<p class='msjExitoUsuario'>Usuario registrado correctamente</p>";
    //     if($_GET["mensaje"]==2) echo "<p class='errYaRegistrado'>Error. El usuario ya está presente en la Base de Datos</p>";
    //     if($_GET["mensaje"]==3) echo "<p class='errUser'>El input está vacío</p>";
    // }
    ?>
</body>
</html>