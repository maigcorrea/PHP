<?php
    class Persona {
        public $nombre;
        public $apellidos;
        private $fecha_nac;

        public function __construct ($n="", $a="", $fn="01/01/2000"){
            $this->nombre = $n;
            $this->apellidos = $a;
            $this->fecha_nac = $fn;
        }

        public function nom_completo(){
            $nom = $this->nombre." ".$this->apellidos;
            return $nom;
        }

        public function set_nom($n){
            $this->nombre = $n;
        }

        public function __toString(){
            $str = "Me llamo ".$this->nom_completo()." y nací en ".$this->fecha_nac;
            return $str;
        }
    }

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

    class Vehiculo{
        private $nom;
        private $tipo;
        private $peso;

        public function __construct($n, $t, $p){
            $this->nom = $n;
            $this->tipo = $t;
            $this->peso = $p;
        }

        public function __get( $atrib ){
            return $this->$atrib;
        }

        public function __set( $atrib, $valor ){
            $this->$atrib = $valor;
        }

        public function __toString(){
            $str = "El vehiculo ".$this->nom." es un".$this->transf_tipo()." y pesa ".$this->peso." toneladas"; 

            return $str;
        }

        private function transf_tipo(){
            $str = "";
            switch($this->tipo){
                case "C":
                    $str=" camion";
                    break;
                case "M":
                    $str="a moto";
                    break;
                case "T":
                    $str=" turismo";
                    break;
            }

            return $str;
        }
    }
?>