<?php
    require_once "class.articulo.php";

    final class ArticuloRebajado extends Articulo{
        private $rebaja;

        public function __construct($pNombre, $pPrecio, $pRebaja) {
            parent::__construct($pNombre, $pPrecio);
            $this->rebaja = $pRebaja;
        }

        private function calculaDescuento() {
            $desc = $this->precio * ($this->rebaja/100);
            return $desc;
        }

        public function precioRebajado(){
            $dif = $this->precio -  $this->calculaDescuento();
            return $dif;
        }

        public function __toString() {
            $str = parent::__toString() . 'La rebaja es: '. $this->rebaja .' %<br />' .'El descuento es: '. $this->calculaDescuento() . '€';
            return $str;
        }
    }

    $articulo = new ArticuloRebajado('Bicicleta', 352.10, 20);

    echo $articulo;
    echo '<br>El precio del articulo rebajado es ' . $articulo->precioRebajado() . '€<br />';
?>


