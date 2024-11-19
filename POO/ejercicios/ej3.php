<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <form action="#" method="post" enctype="multipart/form-data">
                
                <input type="submit" value="Enviar" name="env">
            </form>
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
        }
    }

    if(isset($_POST["env"])){

    }else{
        echo '
            <form action="#" method="post" enctype="multipart/form-data">
                
                <input type="submit" value="Enviar" name="env">
            </form>
        ';
    }
?>