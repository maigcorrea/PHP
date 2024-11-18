<?php
    class animal{
        public $nombre;
        public $color;
        public $f_nac;

        public function __contruct($no,$col,$f_n){
            $this->$nombre=$no;
            $this->$color=$col;
            $this->$f_nac=$f_n;
        }

        public function setNombre($n){
            $this->$nombre=$n;
        }

        // $anim->__set("nombre", "Tobby");

        public function setColor($c){
            $this->$color=$c;
        }

        public function setfecha($f){
            $this->f_nac=$f;
        }

        public function edad(){
            $fecha = strtotime($this->f_nac);
            $sTot = time() - $fecha;

            $edad = round($sTot / (3600*24*365));

            return $edad;
        }

        public function __toString(){
            $str = "Me llamo ".$this->$nombre."Soy de color".$this->$color."Y nací en ".$this->$f_nac;
            return $str;
        }
    }
?>

<?php
if(isset($_POST["env"])){
    $animal = new animal ($_POST["nombre"],$_POST["color"],$_POST["fecha"]);
    echo $animal;
}else{
?> 
    <form action="" method="POST">
        <label for="nombre">Dime el nombre</label>
        <input type="text" name="nombre">
        <label for="color">Dime el color</label>
        <input type="text" name="color">
        <label for="fehca">Dime la f_nac</label>
        <input type="date" name="fehca">
        <input type="submit" name="enviar" value="env">
    </form>

<?php
}
?>

