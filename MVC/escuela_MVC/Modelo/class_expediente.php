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


        public function verExpediente($modulo){
            $sentencia="SELECT alum.nombre,e.nota,asig.nombre FROM expediente e,alumno alum,asignatura asig WHERE e.alumno=alum.id AND asig.id=e.asignatura AND asig.modulo=?;";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_param("i",$modulo);
            $consulta->bind_result($nombreAlumno,$nota,$asignatura);
            $consulta->execute(); 

            $alumnos=[];
            // $notas=[];

            while($consulta->fetch()){
                $alumnos[]=["nombre"=>$nombreAlumno,"nota"=>$nota,"asignatura"=>$asignatura];
            }

            $consulta->close();
            return $alumnos;
        }
    }
?>