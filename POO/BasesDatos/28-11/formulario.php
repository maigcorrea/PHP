<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                
<!-- header(location) -->
    <?php
        if(isset($_POST["env"])){

            if(strlen($_POST["pass"])>=8 && strlen($_POST["pass"])<=20){
                if($_POST["pass"]===$_POST["pass2"]){
                    $db=new mysqli('localhost','root','','ejercicios');
                    
                    if($res = $db->query('Select nombre from usuarios where nombre="'.$_POST["nom"].'";')){
                        if($res->num_rows == 0){
                            $db->query("Insert into usuarios values('".$_POST["nom"]."','".$_POST["pass"]."');");
                            echo "Usuario insertado correctamente";
                        }else{
                            echo "El usuario ya   existe";
                            if(isset($_POST["env1"])){
                                if($res=query('Select nombre from usuarios where nombre="'.$_POST["nom1"].'" and contrasenia="'.$_POST["pass1"].'";')){
                                    if($res->num_rows == 1){
                                        echo "Has iniciado sesión con exito";
                                        // header("Location:3; inicioSesion.php"); //Se crean dos páginas php, una de inicio de sesión y otra de registro
                                    }else{
                                        echo "El nombre de usuario o la contraseña no coinciden";
                                        // header("Location: registro.php?err=1")
                                    }
                                }
                            }else{
                                echo '
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <label for="nom1">Introduce tu nombre</label><br>
                                    <input type="text" name="nom1" id=""><br>
                                    <label for="pass1">Introduce la contraseña:</label><br>
                                    <input type="text" name="pass1" id=""><br>
                                    
    
                                    <input type="submit" value="Enviar" name="env1">
                                </form>
                                ';
                            }
                            
                        }
                        
                        
                    }
                }else{
                    echo "Las contraseñas no son iguales";
                }
            }else{
                echo "La contraseña debe tener entre 8 y 20 caracteres";
            }


            
        }else{
            echo '
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="nom">Introduce tu nombre</label><br>
                    <input type="text" name="nom" id=""><br>
                    <label for="pass">Introduce la contraseña:</label><br>
                    <input type="text" name="pass" id=""><br>
                    <label for="pass2">Introduce la contraseña de nuevo:</label><br>
                    <input type="text" name="pass2" id=""><br>

                    <input type="submit" value="Enviar" name="env">
                </form>
            ';
        }
    ?>
</body>
</html>