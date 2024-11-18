<?php
    class persona {
        public $nombre;
        public $apellido;
        private $fecha_nac;

        public function __construct ($n="",$a="",$fn="01/11/2002"){
            $this->nombre = $n;
            $this->apellido = $a;
            $this->fecha_nac = $fn;
        }

        public function nom_completo(){
            $nom=$this->nombre." ".$this->apellido;
            return $nom;
        }

        public function set_nom($n){
            $this->nombre=$n;
        }

        public function __toString(){
            $str="Me llamo ".$this->nom_completo()." y nací en ".$this->fecha_nac;
            return $str;
        }
    }

    $yo=new persona("Erica","Palomino");
    echo $yo;
?>