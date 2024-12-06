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
                    $sent="INSERT INTO usuarios(nombre) VALUES (?);";//No hay que pasarle dos parámetros ?,? haciendo referencia la nombre y al tiempo en el que empieza, porque el tiempo, al estar predeterminado en la bd como current_timesptamp(), va a manejarlo automáticamente MySQL, es decir, lo va a insertar automáticamente

                    $cons=$this->bd->prepare($sent);
                    // $t = time();
                    $cons->bind_param("s",$this->nombre);
                    $cons->execute();


                    $cons->close();

                    header("Location:cuestionario.php?mensaje=1");
                    exit(); //El exit() sirve para asegurarse de que el script se detenga y no siga ejecutandose
                }else{
                    header("Location:cuestionario.php?mensaje=2");
                    exit();
                }
                
            }




            public function check_usuario($inputNom){

                $sent="SELECT count(nombre) FROM usuarios WHERE nombre=?;"; //? indica que es un paraámetro dinámico, es decir, que será introducido más tarde y que puede ser un nombre diferente cada vez que se ejecute la consulta

                try{
                    $cons=$this->bd->prepare($sent);//Crea un objeto preparado basado en la consulta(sent)
                    $cons->bind_param("s",$inputNom);//Reemplaza ? en la consulta por el valor real del nombre, en este caso, el parámetro pasado al método($inputNom)
                    try{
                        $cons->execute();//Se ejecuta la consulta preparada
                    }catch(Exception $e){
                        echo "Error al ejecutar la consulta para comprobar si el usuario ya existe en la bd";
                    }

                    $cons->bind_result($cont);//Asocia el resultado de la ejecución de la consulta con la variable $cont, es decir, en esa variable se va almacenar el resultado (El resultado será una fila)

                    $cons->fetch(); //Como el o los resultados siempre se devuelven en una o varias filas, fetch recupera esa fila y la coloca en la variable vinculada, en este caso $cont. En el caso de devolver varias filas, habría que hacer un bucle while (mientras que saque resultados, estos se van almacenando)
                    
                    
                    //Lo que devuelva el método lo utilizaremos a su vez en otro método (Llamando a esta función) para saber si tenemos que insertar o no el usuario
                    //Si el nombre no existe en la bd, significa que se podrá insertar al usuario, y por eso devuelve true, si devuelve 1, significará que el usuario no existe y por tanto no se puede insertar
                    if($cont==0){
                        return true;
                    }else{
                        return false;
                    }
                
                }catch(Exception $e){
                    echo "Error al comprobar si el usuario ya existe en la bd";
                }finally{
                    if(isset($cons)){
                        $cons->close(); //Se cierra la consulta para liberar los recursos
                    }
                }              
            }



            public function __toString(){
                $str = " <br>".$this->nombre;
                return $str;
            }
        }
    ?>
</body>
</html>