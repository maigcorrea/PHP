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
            //Consulta para obtener los módulos
            $sentencia="SELECT DISTINCT modulo FROM asignatura";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_result($modulo);
            $consulta->execute();

            $modulos=[];

            while($consulta->fetch()){
                $modulos[]=$modulo;
            }

            $consulta->close();

            //Consulta para obtener los cursos
            $sentencia="SELECT DISTINCT curso FROM asignatura";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_result($curso);
            $consulta->execute();

            $cursos=[];

            while($consulta->fetch()){
                $cursos[]=$curso;
            }

            $consulta->close();
            
            //Retornar los dos resultados en un array
            return [
                'modulos'=>$modulos,
                'cursos'=>$cursos,
            ];
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