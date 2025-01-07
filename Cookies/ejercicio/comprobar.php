<?php
    
    require_once "./inicio.php";

    try{
        $db=new mysqli('localhost','root','','cookies');
        $db->set_charset("utf8");
    }catch(Exception $e){
        echo "Error";
    }

    function comprobarBD(mysqli $db){
        $sent="SELECT usuario FROM usuarios where usuario=?";
        $cons= $db->prepare($sent);
        $cons->bind_param("s",$_POST["user"]);
        $cons->execute();
        $cons->bind_result($user);
        $cons->fetch();
        $cons->close();
        if($user){
            //El usuario está en la BD, se comprueba la contraseña
            $sent1="SELECT usuario FROM usuarios where pass=?";
            $cons1= $db ->prepare($sent1);
            $cons1->bind_param("s",$_POST["password"]);
            $cons1->execute();
            $cons1->bind_result($pass);
            $cons1->fetch();
            $cons1->close();
            if($pass){
                //La contraseña es correcta, se inicia sesión
                if(isset($_POST["cookies"])){
                    $n_cookie="usuario";
                    $val_cookie=$user;
                    setcookie($n_cookie,$val_cookie, time() + (86400 * 30));
                }
                
                header("Location:dashboard.php");
            }else{
                header("Location:inicio.php?mensaje=2");
            }
        }else{
            header("Location:inicio.php?mensaje=1");
        }
    }

?>