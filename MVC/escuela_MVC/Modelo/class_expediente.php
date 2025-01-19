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


        public function insertarNota(){
            $senctencia="INSERT INTO expediente (alumno,asignatura,nota)";
        }
    }
?>