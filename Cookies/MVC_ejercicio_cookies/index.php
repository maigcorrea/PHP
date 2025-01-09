<?php
session_start();

require_once('modelo.php');

    function inicio(){
        if(isset($_POST["fini"])){
           $db=new db();

            if(isset($_POST["rec"]) && isset($_COOKIE["usuario"])){
                setcookie("usuario","", time()-(86400*30));
                // sleep(2);
            }

           if($db->comprobarCrede($_POST["nom"],$_POST["psw"])){
                if(isset($_POST["rec"])){
                    setcookie("usuario",$_POST["nom"], time()+(86400*30));
                }

                $_SESSION["usu"]=$_POST["nom"];
                $nUsu=$_POST["nom"];
                require_once('bienvenida.php');
           }else{
                require_once('login.php');
           }
        }
    }

    function cerrar(){
        session_unset();
        session_destroy();

        header("Location:index.php");
    }

    if(isset($_REQUEST["action"])){
        $action=$_REQUEST["action"];

        $action();
    }else{
        if(isset($_SESSION["usu"])){
            $nUsu=$_SESSION["usu"];
            require_once("bienvenida.php");
        }else{
            header("Location: login.php");
        }
    }
?>