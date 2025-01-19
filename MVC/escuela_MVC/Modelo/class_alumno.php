<?php
    require_once("class_bd.php");

    class alumno{
        private $conn;
        private $id;
        private $dni;
        private $nombre;


        public function __construct(){
            $this->conn=new bd();
            $this->id;
            $this->dni;
            $this->nombre;
        }


        public function get_alumnos($modulo,$curso){
            $sentencia="SELECT a.id,a.nombre FROM alumno a, expediente e WHERE a.id=e.alumno AND "
        }
    }

?>