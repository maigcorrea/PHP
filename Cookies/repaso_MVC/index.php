<?php
    session_start();
    require_once("class_db.php");
    require_once("conection.php");

    //Función para iniciar sesión
    function iniciar(){
        //Si el form de login ha sido enviado
        if(isset($_POST["fini"])){
            //Se crea una instancia de la clase y se comprueba si los datos proporcionados por el usuario son correctos
            $bd=new db();

            //PREGUNTA 3. Esto se hace para eso?
            //Si al mandar el form, la casilla de recordar está marcada, y ya existe una cookie anterior, se borra la cookie anterior. Esto se hace por si inicia sesión otra persona, para que no se quede con la cookie del aterior usuario y su cookie nueva se genere.
            if(isset($_POST["rec"]) && isset($_COOKIE["usuario"])){
                setcookie("usuario","", time()-(86400*30));
            }

            if($bd->comprobarCrede($_POST["nom"],$_POST["psw"])){
                //Si las credenciales son correctas, y el usuario a marcado la casilla de recordar, se guarda una cookie
                if(isset($_POST["rec"])){
                    setcookie("usuario",$_POST["nom"], time()+(86400*30));
                }

                //Si las credenciales son correctas, se abre una sesion
                $_SESSION["usu"]=$_POST["nom"];

                //Se guarda el nombre del usuario (que está en la sesión), para luego utilizarlo dentro de la página de bienvenida
                $nUsu=$_SESSION["usu"];

                //PREGUNTA 1
                //Se redirige a la página de bienvenida. En este caso se pone el require_once para insertar el código que haya en bienvenida.php dentro de este archivo,, así podemos utilizar la variable anterior en bienvenida.php, y así aparecerá el contenido de bienvenida sin necesidad de redirigir.
                require_once("bienvenida.php");
            }else{
                //PREGUNTA 1
                //Si las credenciales no son correctas, se redirige de nuevo al login.  En este caso se pone el require_once para insertar el código que haya en login.php dentro de este archivo, así aparecerá el formulario de inicio sin necesidad de redirigir.
                require_once("login.php");
            }
        }
    }

    //Función para cerrar sesión
    function cerrar(){
        //Si se ha enviado el form para cerrar la sesión (el botón de bienvenida.php)
        if(isset($_POST["cerr"])){
            //Si existe la sesión
            if(isset($_SESSION["usu"])){
                //Se elimina la sesión
                session_unset();
                session_destroy();
                
                //PREGUNTA 2
                //Se redirige al mismo archivo(index.php), donde a su vez se redigirá al form de login al comprobar que este no ha sido enviado
                header("Location: index.php");
            }else{
                //PREGUNTA 2
                //Si no existe la sesión, sólo se redirige al mismo archivo (index.php), donde a su vez se redigirá al form de login al comprobar que este no ha sido enviado.
                header("Location: index.php");
            }
        }
    }



    //Si se ha enviado el action (al enviar el formulario)
    if(isset($_REQUEST["action"])){//Request recoge los $_GET y $_POST a la vez
        //Se almacena el valor de action, que dependiendo del form puede ser iniciar o cerrar
        $action=$_REQUEST["action"];

        //Se llama a la función que corresponda mediante la var anterior, puesto que esta almacena el valor del action, que coincide con el nombre de las funciones, dependiendo de su valor se llamará a una función o a otra
        $action();
    }else{
        //Si no se ha recibido el action del formulario (este no se ha rellenado), puede haber 2 opciones: a) Qué previamente un usuario haya iniciado sesión y por tanto, se le tiene que redirigir a la página de bienvenida mientras su sesión siga abierta; b) Qué el usuario nunca haya iniciado sesión y por tanto, se le redirige al login.
        
        //Se comprueba si la sesión está abierta
        if($_SESSION["usu"]){
            //Se guarda el nombre del usuario (que está en la sesión), para luego utilizarlo dentro de la página de bienvenida
            $nUsu=$_SESSION["usu"];

            //PREGUNTA 1
            //Si hay una sesión abierta, se redirige a la página de bienvenida. En este caso se pone el require_once para insertar el código que haya en bienvenida.php dentro de este archivo, así aparecerá el contenido de bienvenida sin necesidad de redirigir.
            require_once("bienvenida.php");
        }else{
            //Si no hay sesión, se redirige a la página del login
            header("Location: login.php");
        }
    }
?>