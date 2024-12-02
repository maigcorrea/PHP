<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        class cliente{
            private $bd;
            private $nif;
            private $nombre;
            private $edad;
            private $usuario;
            private $pass;
            

            //Cuando llamas al objeto lo que tienes que pasarle sí o sí es la conexión a la base de datos
            public function __construct($db,String $n="",String $nom="",int $ed=0,String $usu="",String $contra=""){
                $this->bd=$db;
                $this->nif=$n;
                $this->nombre=$nom;
                $this->edad=$ed;
                $this->usuario=$usu;
                $this->pass=$contra;
            }


            public function get_datos(){
                $sent="SELECT * FROM cliente;";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($this->nif,$this->nombre,$this->edad,$this->usuario,$this->pass);
                $cons->execute();

                while($cons->fetch()) echo $this;

                $cons->close(); 
            }


            public function __toString(){
                $str = " <br>NIF:".$this->nif."<br>Nombre:".$this->nombre."<br>Edad:".$this->edad."<br>Usuario:".$this->usuario."<br>";
                return $str;
            }


            public function __destruct(){
                $this->bd->close();
            }


        }



        
    ?>
</body>
</html>