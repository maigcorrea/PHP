<?php
    require_once('class.db.php');

    class libro{
        private $db;

        public function __construct(){
            $this->db = new db();
        }

        public function getLibros(){
            $conn = $this->db->__get("conn");
            $sent = "SELECT id, titulo FROM libros WHERE estado=1";

            $cons = $conn->prepare($sent);
            $cons->bind_result($id, $tit);
            $cons->execute();

            $lista = array();

            while($cons->fetch()){
                $lista[$id] = $tit;
            }

            $cons->close();

            return $lista;
        }

        public function getLibro(int $id){
            $conn = $this->db->__get("conn");
            $sent = "SELECT id, titulo, autor FROM libros WHERE id=?";

            $cons = $conn->prepare($sent);
            $cons->bind_result($id, $tit, $aut);
            $cons->bind_param("i", $id);
            $cons->execute();

            $lib = array();

            while($cons->fetch()){
                $lib['id'] = $id;
                $lib['titulo'] = $tit;
                $lib['autor'] = $aut;
            }

            $cons->close();

            return $lib;
        }

        public function delLibro(int $id){
            $conn = $this->db->__get("conn");
            $sent = "DELETE FROM libros WHERE id=?";

            $cons = $conn->prepare($sent);
            $cons->bind_param("i", $id);
            $cons->execute();

            $res = false;

            if($cons->affected_rows == 1) $res = true;

            $cons->close();

            return $res;
        }

        public function updtLibro(int $id, String $tit, int $aut, int $est){
            $conn = $this->db->__get("conn");
            $sent = "UPDATE libros SET titulo=?, autor=?, estado=? WHERE id=?";

            $cons = $conn->prepare($sent);
            $cons->bind_param("siii", $tit, $aut, $est, $id);
            $cons->execute();

            $res = false;

            if($cons->affected_rows == 1) $res = true;

            $cons->close();

            return $res;
        }

        public function insLibro(String $tit, int $aut){
            $conn = $this->db->__get("conn");
            $sent = "INSERT INTO libros(titulo, autor) VALUES(?, ?)";

            $cons = $conn->prepare($sent);
            $cons->bind_param("si", $tit, $aut);
            $cons->execute();

            $res = false;

            if($cons->affected_rows == 1) $res = true;

            $cons->close();

            return $res;
        }

    }
?>