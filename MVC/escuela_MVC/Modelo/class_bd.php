<?php
     require_once("../../../../../cred.php");

     class bd{
        private $conn;

        public function __construct(){
            $this->conn=new mysqli("localhost",USU_CONN,PSW_CONN,"escuela");
        } 

        public function getConection(){
            return $this->conn;
        }
     }
?>