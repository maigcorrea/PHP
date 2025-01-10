<?php
//Gestionamos las cookies y sesiones en otro modelo por separado
    
    //Setterar una cookie
    function set_cookie(String $nom, $val){
        setcookie($nom,$val,time()+(86400*30));
    }

    //Eliminar una cookie
    function unset_cookie(String $nom){
        $comp=false;

        if(isset($_COOKIE[$nom])){
            setcookie($nom,"",time()-(86400*30));
            $comp=true;
        }

        return $comp;
    }

    function start_session(){
        //Se comprueba si la sesión existe, si no está, se crea
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    //Función para abrir una sesión
    function set_session(String $nom, $val){
        start_session();
        $_SESSION[$nom]=$val;
    }


    function get_session(String $nom){
        start_session(); //Para acceder a las variables de sesión
        return $_SESSION[$nom];
    }

    function unset_session(){
        start_session();
        session_unset();
        session_destroy();
    }

    //Comprueba que la sesión exista
    function is_session(String $nom){
        //Como no sabes si has inicializado sesión o no po0nes start_session
        start_session();
        $isset=isset($_SESSION[$nom]);
        
        return $isset;
    }
?>