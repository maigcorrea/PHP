<?php
    //LIBROS
    function listarLib(){
        require_once('../Modelo/class.libro.php');

        $lib = new libro();

        $lista = $lib->getLibros();
        $tipo = "Libros";

        require_once('../Vista/listaLibros.php');
    }

    function borrarLib(){
        require_once('../Modelo/class.libro.php');
        $lib = new libro();
        $cont = 0;

        foreach($_POST as $key=>$idLib){
            if(preg_match("'^lib\d+$'", $key)){
                if(!$lib->delLibro($idLib)) $err = '<p style="color:red">Ha habido un error al borrar</p>';

                $cont++;
            }  
        }

        if($cont != 0){
            if(!isset($err)) $err = '<p style="color:green">Los libros se han borrado correctamente</p>';
        }else{
            $err = '<p style="color:red">No se ha seleccionado ningún libro</p>';
        }

        $lista = $lib->getLibros();
        $tipo = "Libros";

        require_once('../Vista/listaLibros.php');
    }

    function modLibro(){
        require_once('../Modelo/class.libro.php');
        $lib = new libro();
        $cont = 0;

        foreach($_POST as $key=>$idLib){
            if(preg_match("'^lib\d+$'", $key)){
                $libro = $lib->getLibro($idLib);
                $cont++;
            }
        }

        if(isset($libro) && $cont==1){
            require_once('../Modelo/class.autor.php');
            $aut = new autor();
            $autores = $aut->getAutores();

            $action="Actualizar";

            require_once('../Vista/formLibro.php');
        }else{
            if($cont == 0) $err = '<p style="color:red">No se ha seleccionado ningún libro</p>';
            else $err = '<p style="color:red">Solo se puede seleccionar un libro</p>';

            $lista = $lib->getLibros();
            $tipo = "Libros";
            
            require_once('../Vista/listaLibros.php');
        }
    }

    function actualizar(){
        require_once('../Modelo/class.libro.php');
        $lib = new libro();

        $id = $_POST['id'];
        $tit = $_POST['titulo'];
        $aut = $_POST['autor'];
        $est = 0;
        if(isset($_POST['estado'])) $est = 1;
    
        if($lib->updtLibro($id, $tit, $aut, $est)) $err = '<p style="color:green">Libro actualizado correctamente</p>';
        else $err = '<p style="color:red">La modificación ha fallado</p>';

        $lista = $lib->getLibros();
        $tipo = "Libros";

        require_once('../Vista/listaLibros.php');
    }

    function añadirLib(){
        require_once('../Modelo/class.autor.php');
        $aut = new autor();
        $autores = $aut->getAutores();

        $action="Guardar";

        require_once('../Vista/formLibro.php');
    }

    function guardarLib(){
        require_once('../Modelo/class.libro.php');
        $lib = new libro();

        $tit = $_POST['titulo'];
        $aut = $_POST['autor'];
    
        if($lib->insLibro($tit, $aut)) $err = '<p style="color:green">Libro guardado correctamente</p>';
        else $err = '<p style="color:red">El guardado ha fallado</p>';

        $lista = $lib->getLibros();
        $tipo = "Libros";

        require_once('../Vista/listaLibros.php');
    }

    function volver(){
        listarLib();
    }

    // AUTORES

    function autores(){
        listarAut();
    }

    function listarAut(){
        require_once('../Modelo/class.autor.php');
        $auts = new autor();

        $lista = $auts->getAutores();
        $tipo = "Autores";

        require_once('../Vista/listaLibros.php');
    }

    function borrarAut(){
        require_once('../Modelo/class.autor.php');
        $aut = new autor();
        $cont = 0;

        foreach($_POST as $key=>$idAut){
            if(preg_match("'^lib\d+$'", $key)){
                if(!$aut->delAutor($idAut)) $err = '<p style="color:red">Ha habido un error al borrar</p>';

                $cont++;
            }  
        }

        if($cont != 0){
            if(!isset($err)) $err = '<p style="color:green">Los autores se han borrado correctamente</p>';
        }else{
            $err = '<p style="color:red">No se ha seleccionado ningún autor</p>';
        }

        listarAut();
    }

    function añadirAut(){
        $action = "Guardar";

        require_once('../Vista/formAut.php');
    }

    function guardarAut(){
        require_once('../Modelo/class.autor.php');
        $aut = new autor();

        $nom = $_POST['nom'];
    
        if($aut->addAutor($nom)) $err = '<p style="color:green">Autor guardado correctamente</p>';
        else $err = '<p style="color:red">El guardado ha fallado</p>';

        $lista = $aut->getAutores();
        $tipo = "Autores";

        require_once('../Vista/listaLibros.php');
    }

    // COMUN
    function borrar(){
        if(isset($_POST['tipo'])){
            if(strcmp($_POST['tipo'], 'Libros') == 0) borrarLib();
            elseif(strcmp($_POST['tipo'], 'Autores') == 0) borrarAut();
        }    
    }

    function modificar(){
        if(isset($_POST['tipo'])){
            if(strcmp($_POST['tipo'], 'Libros') == 0) modLibro();
            elseif(strcmp($_POST['tipo'], 'Autores') == 0) listarAut();
        }
    }

    function añadir(){
        if(isset($_POST['tipo'])){
            if(strcmp($_POST['tipo'], 'Libros') == 0) añadirLib();
            elseif(strcmp($_POST['tipo'], 'Autores') == 0) añadirAut();
        }
    }

    function guardar(){
        if(isset($_POST['titulo'])) guardarLib();
        elseif(isset($_POST['nom'])) guardarAut();
    }

    if(isset($_REQUEST['action'])){
        $action = strtolower($_REQUEST['action']);

        $action();
    }else{
        listarLib();
    }
?>