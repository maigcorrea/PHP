<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            
</body>
</html>
<?php
    class imagen{
        private $src;
        private $border;
        private $ruta_images;


        public function __contruct($s,$bor,$rut){
            if(!file_exists($rut)){
                mkdir($rut);
            }

            $this->src=$s."/".$rut;
            $this->border=0;
            $this->ruta_images=$rut;
        }

        public function comprobar_ruta_existe(){
            if(!file_exists($this->ruta_images)){
                mkdir($this->ruta_images);
            }
        }

        public function __toString(){
            $str = "<img src='".$this->src."' border='".$this->border."px'>";
            return $str;
        }
    }

    if(isset($_POST["env"])){
        $img=new imagen($_POST["arch"],$_POST["borde"],"./img.".$_POST["arch"]);

        $img ->__toString();
    }else{
        
        $dir=scandir("./");
        $archivos=scandir("./img");

        echo '
            <form action="#" method="post" enctype="multipart/form-data">
            <select name="arch">';
                
            foreach ($archivos as $archivo) {
                echo "<option value=\"$archivo\">$archivo</option>";
            }

            echo '
                </select>
                <label for="borde">Introduce el tamaño del borde</label>
                <input type="number" name="borde">
                <input type="submit" value="Enviar" name="env">
            </form>
        ';
    }
?>