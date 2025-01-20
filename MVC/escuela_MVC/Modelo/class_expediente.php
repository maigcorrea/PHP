<?php
    require_once("class_bd.php");

    class expediente{
        private $conn;
        private $id;
        private $alumno;
        private $asignatura;
        private $nota;


        public function __construct(){
            $this->conn=new bd();
            $this->id="";
            $this->alumno="";
            $this->asignatura="";
            $this->nota="";
        }


        public function insertarNota($alumno,$asignatura,$nota){
            $sentencia="INSERT INTO expediente (alumno,asignatura,nota) VALUES(?,?,?);";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_param("iid",$alumno,$asignatura,$nota);
            $consulta->execute();

            $insertado=false;
            if($consulta->affected_rows==1){
                $insertado=true;
            }

            return $insertado;
        }
    }
?>