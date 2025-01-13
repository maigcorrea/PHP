
<?php
    require_once("./class_bd.php");

    class libro{
        private $conn;
        private $id;
        private $titulo;
        private $autor;

        public function __construct(){
            $this->conn=new db();
            $this->titulo="";
            $this->autor="";
        } 

        public function listarLibros(){
            $sentencia="SELECT id,titulo,autor,disponible FROM libro";
            $consulta=$this->conn->prepare($sentencia);
            
            $consulta->execute();
            $consulta->bind_result($id,$titulo,$autor,$disponible);
            $libros=[];
            
            while($consulta->fetch()){
                $libros[$id]={$titulo, $autor, $disponible};     
            }

            $consulta->close();
            return $libros;
        }


    //    public function addLibro(){
    //         $sentencia="INSERT INTO libro (titulo,autor,disponible) VALUES(?,?,?);";
    //         $consulta=$this->conn->prepare($sentencia);
    //         $consulta->bind_result("s,i,s")
    //    }
        

        


    }
?>


