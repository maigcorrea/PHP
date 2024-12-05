<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        class preguntas{
            private $bd;
            private $cod;
            private $enunciado;
            private $respuesta;

            public function __construct($db,$cod="", $enun="", $res=""){
                $this->bd=$db;
                $this->cod=$cod;
                $this->enunciado=$enun;
                $this->respuesta=$res;
            }

            public function get_pregunta(){
                $sent="SELECT enunciado FROM preguntas;";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($this->enunciado);
                $cons->execute();


                while($cons->fetch()) echo $this;

                $cons->close(); 
            }


            public function __toString(){
                $str = " <br>".$this->enunciado;
                return $str;
            }
        }


        class usuarios{
            private $bd;
            private $nombre;
            private $tEmpieza;
            private $tFinal;

            public function __construct($db,$nom="", $tEmp="", $tFin=""){
                $this->bd=$db;
                $this->nombre=$nom;
                $this->tEmpieza=$tEmp;
                $this->tFinal=$tFin;
            }


            public function insertarUsuarioTiempo(){
                if($this->check_usuario($this->nombre)){
                    $sent="INSERT INTO usuarios(nombre, tEmpieza) VALUES (?, ?);";

                    $cons=$this->bd->prepare($sent);
                    $t = time();
                    $cons->bind_param("si",$this->nombre, $t);
                    $cons->execute();


                    $cons->close();
                }else{
                    echo "Error. El usuario ya está en la base de datos";
                }
                
            }




            public function check_usuario($inputNom){

                $sent="SELECT count(nombre) FROM usuarios WHERE nombre=$inputNom;";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($cont);
                $cons->execute();


                $cons->fetch();
                    
                    if($cont==0){
                        return true;
                    }else{
                        return false;
                    }
                
                    
                

                $cons->close(); 
            }



            public function __toString(){
                $str = " <br>".$this->nombre;
                return $str;
            }
        }
    ?>
</body>
</html>