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


        public function get_asignaturas($modulo,$curso){
            $sentencia="SELECT id,nombre FROM asignatura WHERE modulo=? AND curso=?";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_param("si",$modulo,$curso);
            $consulta->bind_result($id,$nombre);
            $consulta->execute();

            $datosAsig=[];

            while($consulta->fetch()){
                $datosAsig[$id]=$nombre;
            }
            
            $consulta->close();
            return $datosAsig;
        }



    }

?>