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

            public function insertarCliente(){
                $sent="INSERT INTO cliente VALUES('".$this->nif."','".$this->nombre."','".$this->edad."','".$this->usuario."','".$this->pass."');";

                $cons=$this->bd->prepare($sent);
                // $cons->bind_result($this->nif,$this->nombre,$this->edad,$this->usuario,$this->pass);
                $cons->execute();

                // while($cons->fetch()) echo $this;

                $cons->close();
            }


            public function sacarNomCliente(){
                $nombres=[];

                $sent="SELECT distinct nombre FROM cliente;";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($this->nombre);
                
                $cons->execute();

                while($cons->fetch()){
                    $nombres[]=$this->nombre;
                    // echo $this;
                    foreach ($nombres as  $value) {
                        echo $value."<br>";
                    }
                };

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



        class venta{
            private $bd;
            private $cliente;
            private $producto;
            private $fecha;
            private $cantidad;
            private $estado;

            public function __construct($db,String $cli="",int $prod=0, $fech="",int $cant=0,String $est=""){
                // parent::__construct($bd);
                $this->bd=$db;
                $this->cliente=$cli;
                $this->producto=$prod;
                $this->fecha=$fech;
                $this->cantidad=$cant;
                $this->estado=$est;
            }
        
            public function get_datos(){
                $sent="SELECT c.nombre,p.descripcion,v.fecha,v.cantidad,v.estado FROM cliente c,venta v,producto p where v.cliente=c.nif AND v.producto=p.cod;";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($this->cliente,$this->producto,$this->fecha,$this->cantidad,$this->estado);
                $cons->execute();

                while($cons->fetch()) echo $this;

                $cons->close(); 
            }


            public function __toString(){
                $str = " <br>Cliente:".$this->cliente."<br>Producto:".$this->producto."<br>Fecha:".$this->fecha."<br>Cantidad:".$this->cantidad."<br>Estado: ".$this->estado."<br>";
                return $str;
            }


            // public function __destruct(){
            //     $this->bd->close();
            // }


        }


        class producto{
            private $cod;
            private $descripcion;
            private $precio;


            public function __construct($db,$cod, $prod, $precio){
                $this->bd=$db;
                $this->codigo=$cod;
                $this->descripcion=$prod;
                $this->precio=$precio;
            }

            public function insertarProducto(){
                $sent="INSERT INTO producto (descripcion,precio) VALUES('".$this->descripcion."','".$this->precio."');";

                $cons=$this->bd->prepare($sent);
                $cons->execute();


                $cons->close();
            }


            
        }

        
    ?>
</body>
</html>