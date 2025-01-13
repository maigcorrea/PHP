<?php
    require_once("../../../../cred.php");

    // un modelo por tabla en la bd, es decir, un modelo por clase
    class db{
        private $conn;

        public function __construct(){//Mysqli $db
            // $this->conn=$db;
            $this->conn= new mysqli("localhost",USU_CONN,PSW_CONN,"cookies");
        }

        public function comprobarCrede(String $nom, String $psw){
            $sentencia="SELECT count(*) FROM usuarios WHERE usuario=? AND pass=?";
            $consulta=$this->conn->prepare($sentencia);
            $consulta->bind_param("ss",$nom,$psw);
            $consulta->bind_result($count);

            $consulta->execute();
            $consulta->fetch();
            $consulta->close();

            $existe=false;
            if($count==1){
                $existe=true;
            }else{
                $exite=false;
            }
            return $existe;
        }


        //Comprobar si el usuario ya está en la bd
        public function checkUsuario(String $nom){
            $sentencia="SELECT count(*) FROM usuarios WHERE usuario=?";

            $consulta=$this->conn->prepare($sentencia);
            $consulta->bind_param("s",$nom);
            $consulta->bind_result($count);

            $consulta->execute();
            $consulta->fetch();
            $consulta->close();

            $existe=false;
            if($count==1){
                $existe=true;
            }else{
                $exite=false;
            }

            return $existe;
        }

        public function registrarUsu(String $nom, String $psw){
            $sentencia="INSERT INTO usuarios VALUES (?,?)";
    
            $consulta=$this->conn->prepare($sentencia);
            $consulta->bind_param("ss",$nom,$psw);
    
            $consulta->execute();
    
            //Comprobar si se ha insertado
            $res=false;
            if($consulta->affected_rows==1){
                $res=true;
            }
            
            return $res;
            $consulta->close();
        }
    }

    
?>