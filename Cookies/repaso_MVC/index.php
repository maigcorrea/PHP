<?php
    
    require_once("conection.php");

    //Función para iniciar sesión
    function iniciar(){
        //Si el form de login ha sido enviado
        if(isset($_POST["fini"])){
            //Cuando el form se rellena se importa modelo.php aquí, para no hacerlo al principio y no gastar recursos
            require_once("modelo.php");
            require_once("class_db.php");

            //Se crea una instancia de la clase y se comprueba si los datos proporcionados por el usuario son correctos
            $bd=new db();

            //PREGUNTA 3. Esto se hace para eso?
            //Si al mandar el form, la casilla de recordar está marcada, y ya existe una cookie anterior, se borra la cookie anterior. Esto se hace por si inicia sesión otra persona, para que no se quede con la cookie del aterior usuario y su cookie nueva se genere.
            if(isset($_POST["rec"])){
                unset_cookie("usuario");
            }

            if($bd->comprobarCrede($_POST["nom"],$_POST["psw"])){
                //Si las credenciales son correctas, y el usuario a marcado la casilla de recordar, se guarda una cookie
                if(isset($_POST["rec"])){
                    set_cookie("usuario",$_POST["nom"]);
                }

                //Si las credenciales son correctas, se abre una sesion
                set_session("usu",$_POST["nom"]);

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
            require_once("modelo.php");
            unset_session();

            header("Location: index.php");
        }
    }

    function registrar(){
        if(isset($_POST["fReg"])){
            //Se importa la clase de la bd
            require_once("class_db.php");
            $db=new db();

            if(strcmp($_POST["psw"],$_POST["psw2"])==0){
                if(!$db->checkUsuario($_POST["nom"])){
                    if($db->registrarUsu($_POST["nom"],$_POST["psw"])){
                        header("Location: index.php");
                    }else{
                        header("Location: index.php?action=registro");
                    }
                }else{
                    $err="<p style='color:red'>El usuario ya está registrado</p>";
                }
            }else{
                $err="<p style='color:red'>Las contraseñas no coinciden</p>";
            }

            require_once("cabecera.html");
            require_once("registro.php");
            require_once("pie.html");
        }
    }

    //Función para que si el usuario no tiene cuenta, le redirija a registro
    function registro(){
        //La cabecera y el pie del html lo tienes en uncarchivo cada uno y así lo vas reutilizando, sólo va a ir cambiando el body
        require_once("cabecera.html");
        require_once("registro.php");
        require_once("pie.html");
    }


    //Si se ha enviado el action (al enviar el formulario)
    if(isset($_REQUEST["action"])){//Request recoge los $_GET y $_POST a la vez
        //Se almacena el valor de action, que dependiendo del form puede ser iniciar o cerrar
        $action=$_REQUEST["action"];

        //Se llama a la función que corresponda mediante la var anterior, puesto que esta almacena el valor del action, que coincide con el nombre de las funciones, dependiendo de su valor se llamará a una función o a otra
        $action();
    }else{
        require_once("modelo.php");
        //Si no se ha recibido el action del formulario (este no se ha rellenado), puede haber 2 opciones: a) Qué previamente un usuario haya iniciado sesión y por tanto, se le tiene que redirigir a la página de bienvenida mientras su sesión siga abierta; b) Qué el usuario nunca haya iniciado sesión y por tanto, se le redirige al login.
        
        //Se comprueba si la sesión está abierta
        if(is_session("usu")){
            //Se guarda el nombre del usuario (que está en la sesión), para luego utilizarlo dentro de la página de bienvenida
            $nUsu=get_session("usu");

            //PREGUNTA 1
            //Si hay una sesión abierta, se redirige a la página de bienvenida. En este caso se pone el require_once para insertar el código que haya en bienvenida.php dentro de este archivo, así aparecerá el contenido de bienvenida sin necesidad de redirigir.
            require_once("bienvenida.php");
        }else{
            //Si no hay sesión, se redirige a la página del login
            header("Location: login.php");
        }
    }


    
?>