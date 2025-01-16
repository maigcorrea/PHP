<?php
    require_once("class_bd.php");

    class autor{
        private $conn;
        private $dni;
        private $nombre;

        public function __construct(){
            $this->conn=new bd();
            $this->dni="";
            $this->nombre="";
        }

        public function getAutores(){
            $sentencia="SELECT dni,nombre from autor;";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->execute();
            $consulta->bind_result($dni,$nombre);

            $autores=[];
            while($consulta->fetch()){
                $autores[$dni]=$nombre;
            }

            $consulta->close();
            return $autores;
        }
    }

?>