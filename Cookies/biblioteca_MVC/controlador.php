<?php

require_once("./class_libro.php");
require_once("./class_autor.php");
//Al controlador se envía el título y el autor desde el formulario
    

    function listar($mens=null){
        $libro=new libro();
        $arrLibros=$libro->listarLibros();
        
        require_once("cabecera.html");
        require_once('listar.php');
        require_once("pie.html");
    }


    function borrar(){
        $libro=new libro();
        foreach($_POST as $key => $value){
            if(preg_match("'^lib\d+'", $key)){
                if($libro->borrarLibro($value)){
                    // $mensaje="corr";
                    $mensaje="<p>Borrado correctamente</p>";
                    
                }else{
                    // $mensaje="err";
                    $mensaje="<p>Error al borrar el libro</p>";
                }
            }
        }

        listar($mensaje);
    }



    // function anadir(){
    //     if(isset($_POST["add"])){
    //         $libro=new libro();
    //         if($libro->addLibro($_POST["nombre"],$_POST["autor"])){
    //             $mensaje="<p>Añadido correctamente</p>";
    //         }else{
    //             $mensaje="<p>Error al borrar el libro</p>";
    //         }
    //     }

    // }

    function anadir(){
        $autor=new autor();
        $arrAutores=$autor->getAutores();

        require_once("cabecera.html");
        require_once('anadir.php');
        require_once("pie.html");

        if(isset($_POST["add"])){
            $libro=new libro();
            if($libro->addLibro($_POST["nombre"],$_POST["autor"])){
                $mensaje="<p>Añadido correctamente</p>";
            }else{
                $mensaje="<p>Error al borrar el libro</p>";
            }
        }
    }



    function anadirLibro($titulo,$autor){
        $libro=new libro();


    }


    if(isset($_REQUEST["action"])){//Request recoge los $_GET y $_POST a la vez
        //Se almacena el valor de action, que dependiendo del form puede ser iniciar o cerrar
        $action=$_REQUEST["action"];

        //Se llama a la función que corresponda mediante la var anterior, puesto que esta almacena el valor del action, que coincide con el nombre de las funciones, dependiendo de su valor se llamará a una función o a otra
        $action();
    }else{
        //LLamar por defecto a la función de listar(Cuando el action no exista, es decir, cuando se entre por primera vez a la página)
        listar();
    }

?>