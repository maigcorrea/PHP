<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Animal{
            private $nombre;
            private $color;
            private $f_nac;
    
            public function __construct($n, $c, $fn){
                $this->nombre = $n;
                $this->color = $c;
                $this->f_nac = $fn;
            }
    
            public function __set($atributo, $valor){
                $this->$atributo = $valor;
            }

            public function __get($algo){
                return $this->$algo;
            }
    
            public function obtener_edad(){
                $fecha = strtotime($this->f_nac);
                $sTot = time() - $fecha;
    
                $edad = round($sTot / (3600*24*365), 0, PHP_ROUND_HALF_DOWN);
    
                return $edad;
            }
    
            public function __toString(){
                $str = "El animal se llama ".$this->nombre." es de color ".$this->color." y tiene ".$this->obtener_edad()." años.";
    
                return $str;
            }
        }


        class perro extends Animal{
            private $raza;
            private $sexo;

            public function __construct($n, $c, $fn,$r,$s){
                parent::__construct($n, $c, $fn);
                $this->raza=$r;
                $this->sexo=$s;
            }

            public function ladrar(){
                $nom=$this->__get($nombre);
                return $nom." dice guau";
            }

            public function dormir(){
                $nom=$this->__get($nombre);
                return $nom." se ha dormido";
            }

            public function __toString(){
                $str=parent::__toString()." Es un perro de raza".$this->raza." y su sexo es ".$this->sexo;
                return $str;
            }
            
        }


        class delfin extends Animal{
            private $longitud;
             
            public function __construct($n, $c, $fn,$lon){
                parent::__construct($n, $c, $fn);
                $this->longitud=$lon;
            }

            public function saltar(){
                $nom=$this->__get($nombre);
                return $nom." Esta saltando por los aires";
            }

            public function comer(){
                $nom=$this->__get($nombre);
                return $nom." tiene hambre";
            }

            public function __toString(){
                $str=parent::__toString()." Es un delfin cuya longitud es ".$this->longitud;
                return $str;
            }
            
        }

    ?>
</body>
</html>