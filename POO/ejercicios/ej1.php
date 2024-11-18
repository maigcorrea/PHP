<?php
    class animal{
        public $nombre;
        public $color;
        public $nacimiento;


        public function __construct($n="",$c="",$fn="01/11/2002"){
            $this->nombre = $n;
            $this->color = $c;
            $this->nacimiento = $fn;
        }

        // public function __set($n,$c,$fn){
        //     $this->nombre=$n;
        //     $this->color=$c;
        //     $this->nacimiento=$fn;
        // }

        public function set_nom($n){
            $this->nombre=$n;
        }

        public function set_color($c){
            $this->color=$c;
        }

        public function set_nac($fn){
            $this->nacimiento=$fn;
        }

        public function obtener_edad(){
            $fechaActual=getdate();
            $anioActual=$fechaActual["year"];

            $fechaNac=strtotime($this->nacimiento);
            $timeStampNac=getdate($fechaNac);
            $anioNac=$timeStampNac["year"];

            $edad=$anioActual-$anioNac;

            return $edad;
        }

        // public function __toString(){
        //     $str="el animal es un ".$this->nombre." y nacio en ".$this->nacimiento."por lo que tiene ".$this.obtener_edad()." años, es de color ".$this->color;
        //     return $str;
        // }
        
    }

    $a=new animal("Gato","blanco","2022-02-21");
    echo $a;
?>