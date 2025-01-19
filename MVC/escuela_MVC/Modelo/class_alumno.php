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


        public function get_alumnos($asig){
            $sentencia="SELECT DISTINCT a.id,a.nombre FROM alumno a, expediente e WHERE a.id=e.alumno AND e.asignatura=?;";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_param("i",$asig);
            $consulta->bind_result($id,$nombre);
            $consulta->execute();

            $alumnos=[];

            while($consulta->fetch()){
                $alumnos[$id]=[$nombre];
            }

            $consulta->close();
            return $alumnos;
        }
    }

?>