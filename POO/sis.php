<?php
    class persona{
        public $nombre;
        public $apellido;
        public $fecha_nac;
        
        public function __construct($n,$a,$f) {
            $this->nombre=$n;
            $this->apellido=$a;
            $this->fecha_nac=$f;
        }
        public function nom_completo(){
            $nom= $this->nombre."". $this->apellido;
            return $nom;
        }

        public function set_nombre($n){
            $this->nombre=$n;
        }
        
        public function __toString(){
            $str ="Me llamo ".$this->nom_completo()." y naci en ".$this->fecha_nac;
            return $str;
        }
    }

    $yo=new persona("pepe","el gintano","7/7/2005");
    echo $yo->nom_completo();
    echo $yo;
?>