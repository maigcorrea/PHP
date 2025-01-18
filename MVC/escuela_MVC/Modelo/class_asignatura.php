<?php
    require_once("class_bd.php");

    class asignatura{
        private $conn;
        private $id;
        private $nombre;
        private $modulo;
        private $curso;

        public function __construct(){
            $this->conn=new bd();
            $this->id="";
            $this->nombre="";
            $this->modulo="";
            $this->curso="";
        }


        public function get_cursos_modulos(){
            $sentencia="SELECT modulo,curso FROM asignatura";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_result($modulo,$curso);
            $consulta->execute();

            $datos=[];

            while($consulta->fetch()){
                $datos[$curso]=[$modulo];
            }

            $consulta->close();
            return $datos;
        }



    }

?>