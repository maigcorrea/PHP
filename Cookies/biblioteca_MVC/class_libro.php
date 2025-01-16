
<?php
    require_once("class_bd.php");

    class libro{
        private $conn;
        private $id;
        private $titulo;
        private $autor;
        private $disp;

        public function __construct(){
            $this->conn=new bd();
            $this->titulo="";
            $this->autor="";
        } 

        public function listarLibros(){
            $sentencia="SELECT id,titulo,autor.nombre,disponible FROM libro,autor";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            
            $consulta->execute();
            $consulta->bind_result($id,$titulo,$autor,$disponible);
            $libros=[];
            
            while($consulta->fetch()){
                $libros[$id]=[$titulo, $autor, $disponible];     
            }

            $consulta->close();
            return $libros;
        }



        public function borrarLibro($id){
            $sentencia="DELETE FROM libro WHERE id=?;";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_param("i",$id);
            $consulta->execute();

            $borrado=false;
            if($consulta->affected_rows==1){
                $borrado=true;
            }else{
                $borrado=false;
            }

            $consulta->close();
            return $borrado;
        }


       public function addLibro($titulo,$autor){
            $sentencia="INSERT INTO libro (titulo,autor) VALUES(?,?);";
            $consulta=$this->conn->getConection()->prepare($sentencia);
            $consulta->bind_param("ss",$titulo,$autor);
            $consulta->execute();

            $anadido=false;

            if($consulta->affected_rows==1){
                $anadido=true;
            }else{
                $anadido=false;
            }

            $consulta->close();
            return $anadido;

       }
        

        


    }
?>


