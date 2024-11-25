<?php
    class Articulo{
        protected $nombre;
        protected $precio;

        public function __construct($pNombre, $pPrecio){
            $this->nombre = $pNombre;
            $this->precio = $pPrecio;
        }


        public function __toString(){
            $str='Nombre: '.$this->nombre.'<br/>'.'Precio: '.$this->precio.'&euro;<br/>';
            return $str;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function setPrecio($pPrecio){
            if(is_numeric($pPrecio)){
                $this->precio=$pPrecio;
            }
        }
    }


    final class ArticuloRebajado extends Articulo{
        private $rebaja;

        public function __construct($pNombre, $pPrecio, $pRebaja){
            parent::__construct($pNombre, $pPrecio);
            $this->rebaja=$pRebaja;
        }

        private function calculaDescuento(){
            $desc=($this->rebaja*parent::getPrecio())/100;
            return $desc;
        }

        public function precioRebajado(){
            $diferencia=parent::getPrecio()-$this->calculaDescuento();
            return $diferencia;
        }

        public function strPadre(){
            return parent::__toString();
        }

        public function __toString(){
            $str1=parent::__toString().". La rebaja es ".$this->rebaja."%: El descuento es ".$this->calculaDescuento()."€";
            return $str1;
        }
    }
?>