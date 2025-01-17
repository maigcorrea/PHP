<?php
    require_once('class.db.php');

    class autor{
        private $db;

        public function __construct(){
            $this->db = new db();
        }

        public function getAutores(){
            $conn = $this->db->__get("conn");
            $sent = "SELECT * FROM autores WHERE id<>0";

            $cons = $conn->prepare($sent);
            $cons->bind_result($id, $nom);
            $cons->execute();

            $lista = array();

            while($cons->fetch()){
                $lista[$id] = $nom;
            }

            $cons->close();

            return $lista;
        }

        public function addAutor(String $nom){
            $conn = $this->db->__get("conn");
            $sent = "INSERT INTO autores(nombre) VALUES (?)";

            $cons = $conn->prepare($sent);
            $cons->bind_param("s", $nom);
            $cons->execute();

            $res = false;

            if($cons->affected_rows == 1) $res = true;

            $cons->close();

            return $res;
        }

        public function delAutor(int $id){
            require_once('class.libro.php');
            $conn = $this->db->__get("conn");
            $sent = "SELECT id, titulo, estado FROM libros WHERE autor=?";

            $cons = $conn->prepare($sent);
            $cons->bind_param("i", $id);
            $cons->bind_result($ident, $nom, $est);
            $cons->execute();

            $lib = new libro();

            while($cons->fetch()){
                $lib->updtLibro($ident, $nom, 0, $est);
            }

            $cons->close();

            $sent = "DELETE FROM autores WHERE id=?";

            $cons = $conn->prepare($sent);
            $cons->bind_param("i", $id);
            $cons->execute();

            $res = false;

            if($cons->affected_rows == 1) $res = true;

            $cons->close();

            return $res;

        }
    }

?>