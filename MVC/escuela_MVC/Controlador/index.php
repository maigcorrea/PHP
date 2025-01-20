<?php
    require_once("../Modelo/class_asignatura.php");
    require_once("../Modelo/class_alumno.php");
    require_once("../Modelo/class_expediente.php");

    function listarCursoModulo(){
        $asig=new asignatura();
        $datos=$asig->get_cursos_modulos();

        require_once("../Vista/cabecera.html");
        require_once("../Vista/vista1.php");
        require_once("../Vista/pie.html");
    }

    function asignaturas(){
        if(isset($_POST)){
            // verAsignaturayAlumnos()
            $modulo=$_POST["modulo"];
            $asig=new asignatura();
            $datosAsig=$asig->get_asignaturas($_POST["modulo"], $_POST["curso"]);
            // foreach ($datosAsig as $key => $value) {
            //     echo $key;
            // }

            //Llamar a vista
            require_once("../Vista/cabecera.html");
            require_once("../Vista/vista1.php");
            require_once("../Vista/pie.html");
        }else{
            //Mensaje de error
            listarCursoModulo();
        }
    }


    function calificar(){
        //Aparece otra vista con los alumnos y botón de enviar
        $asignatura=$_POST["asig"];
        $alum=new alumno();
        $alumnos=$alum->get_alumnos($_POST["asig"]);
        

        // echo "<p>$asignatura</p>";

        require_once("../Vista/cabecera.html");
        require_once("../Vista/vista2.php");
        require_once("../Vista/pie.html");
    }


    function poner_nota(){
        //Llamar a la funcion de insert
        $exped=new expediente();

        $insertado=$exped->insertarNota($_POST["alum"], $_POST["asignat"], $_POST["nota"]);

        if($insertado){
            $mensaje="insertado Correctamente";
        }else{
            $mensaje="Fallo al insertar";
        }

        require_once("../Vista/cabecera.html");
        require_once("../Vista/vista2.php");
        require_once("../Vista/pie.html");
    }


    function ver_expediente(){
        //Aparece otra vista con los alumnos 
        // $modulo=$_POST["modulo"];

        $exped=new expediente();
        $alumnosExpediente=$exped->verExpediente($_POST["modulo"]);

        require_once("../Vista/cabecera.html");
        require_once("../Vista/vista3.php");
        require_once("../Vista/pie.html");
    }
    



    if(isset($_REQUEST["action"])){
        $action=strtolower($_REQUEST["action"]);

        $action();
    }else{
        //Mostrar la lista de módulos y cursos
        listarCursoModulo();
    }
?>