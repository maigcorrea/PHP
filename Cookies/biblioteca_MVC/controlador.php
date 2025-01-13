<?php

require_once("class_libro");
//Al controlador se envía el título y el autor desde el formulario
    

    function listar(){
        $libro=new libro();
        $ej=$libro->listarLibros();

        require_once('listar.php');
    }


    if(isset($_REQUEST["action"])){//Request recoge los $_GET y $_POST a la vez
        //Se almacena el valor de action, que dependiendo del form puede ser iniciar o cerrar
        $action=$_REQUEST["action"];

        //Se llama a la función que corresponda mediante la var anterior, puesto que esta almacena el valor del action, que coincide con el nombre de las funciones, dependiendo de su valor se llamará a una función o a otra
        $action();
    }else{

    }

?>