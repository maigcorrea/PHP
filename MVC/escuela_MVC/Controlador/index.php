<?php
    require_once("../Modelo/class_asignatura.php");

    function listarCursoModulo(){
        $asig=new asignatura();
        $datos=$asig->get_cursos_modulos();

        require_once("../Vista/cabecera.html");
        require_once("../Vista/vista1.php");
        require_once("../Vista/pie.html");
    }

    listarCursoModulo();
?>