<?php
    class db{
        private $conn;

        public function __construct(){
            require_once('../../../cred.php');
            $this->conn = new mysqli("localhost", USR, PSW, 'biblio');
        }

        public function __get($nom){
            return $this->$nom;
        }
    }
?>