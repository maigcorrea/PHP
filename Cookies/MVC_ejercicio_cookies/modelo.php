<?php
    // un modelo por tabla en la bd, es decir, un modelo por clase
    class db{
        private $conn;

        public function __construct(){
            $this->conn= new mysqli("localhost","root","","cookies");
        }

        public function comprobarCrede(String $nom, String $psw){
            $sentencia="SELECT count(*) FROM usuarios WHERE usuario=? AND pass=?";
            $consulta=$this->conn->prepare($sentencia);
            $consulta -> bind_param("ss",$nom,$psw);
            $consulta->bind_result($count);

            $consulta->execute();
            $consulta->fetch();

            $existe=false;
            if($count==1){
                $existe=true;
            }

            $consulta->close();
            return $existe;
        }
    }
?>