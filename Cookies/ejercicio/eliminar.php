<?php

    function cerrar(){
        if(isset( $_COOKIE["usuario"])){
            //Si la cookie existe se elimina
            setcookie("usuario","", time() - (86400 * 30));
            header("Location:inicio.php");
            exit;
        }else{
            echo "La cookie no se ha generado. Se genera y se borra automáticamente";
        }
    }
    
?>