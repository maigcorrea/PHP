<?php
    require_once("../Modelo/class_asignatura.php");

    function listarCursoModulo(){
        $asig=new asignatura();
        $datos=$asig->get_cursos_modulos();

        foreach ($datos as $key => $value) {
            echo $value[0];
        }

        // require_once("../Vista/cabecera.html");
        // require_once("../Vista/vista1.php");
        // require_once("../Vista/pie.html");
    }

    function calificar(){
        if(isset($_POST)){
            // verAsignaturayAlumnos()
            $asig=new asignatura();
            $datosAsig=$asig->get_asignaturas($_POST["modulo"], $_POST["curso"]);
            // foreach ($datosAsig as $key => $value) {
            //     echo $key;
            // }

            //Llamar a vista
            // require_once("../Vista/cabecera.html");
            // require_once("../Vista/vista2.php");
            // require_once("../Vista/pie.html");
        }else{
            //Mensaje de error
            listarCursoModulo();
        }
    }
    



    if(isset($_REQUEST["action"])){
        $action=strtolower($_REQUEST["action"]);

        $action();
    }else{
        //Mostrar la lista de módulos y cursos
        listarCursoModulo();
    }
?>