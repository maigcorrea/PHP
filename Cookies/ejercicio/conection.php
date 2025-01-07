<?php

    try{
        $db=new mysqli('localhost','root','','cookies');
        $db->set_charset("utf8");
    }catch(Exception $e){
        echo "Error";
    }
?>