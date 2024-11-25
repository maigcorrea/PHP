<?php
    class Articulo{
        protected $nombre;
        protected $precio;

        public function __construct($pNombre,$pPrecio) {
            $this->nombre=$pNombre;
            $this->precio=$pPrecio;
        }

        public function __toString(){
            $str = 'Nombre: '. $this->nombre . '<br />'.'Precio: '.$this->precio. '&euro;<br />';
            return $str;
        }

        public function setPrecio($pPrecio) {
            if (is_numeric($pPrecio)) {
                $this->precio = $pPrecio;
            } 
        }

        public function getPrecio(){
            return $this->precio;
        }
    }

?>

