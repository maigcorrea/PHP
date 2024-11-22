<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST["enviar"])){
            //CREACION DE LA CLASE
            class Imagen{
                // VARIABLES
                private $src;
                private $border;
                private $ruta_imagen;
                private $ancho;
                private $alto;
                //CONSTRUCTOR
                public function __construct($s="", $b="", $ri="",$an=0,$al=0){
                    $this->src = $s;
                    $this->border = $b;
                    $this->ruta_imagen = "./images/".$ri;
                    $this->ancho = $an;
                    $this->alto = $al;
                }
                //TO STRING
                public function __toString(){
                    $str = "<p>NOMBRE DE LA IMAGEN: ".$this->src."</p><img width=\"$this->ancho\" height=\"$this->alto\" src=\"".$this->ruta_imagen."\" border=\"".$this->border."\"/>";
                    return $str;
                }
            }
            // COMPRUEBA SI INTRODUCE IMAGEN
            function compImg(){
                if(!isset($_POST["img"])){
                    header("Location:ejercicio3.php?err=1");
                }
            }
            //LLAMO A LA FUNCION
            compImg();
            //CREO LA CLASE
            $img = new Imagen($_POST["img"], $_POST["border"], $_POST["img"], $_POST["ancho"], $_POST["alto"]);
            //POR DEFECTO SE LLAMARA A LA RUTA TOSTRING
            echo $img;
        }else{
    ?>
    <form id="chulo" action="ejercicio3.php" name="aux" method="post" enctype="multipart/form-data">
        <select class="dir" name="dir">
            <option value="d">Escoge una opcion</option>
            <?php
                $url = "./";
                $ficheros1  = scandir($url);
                $cont = 0;
                foreach ($ficheros1 as $key) {
                    $aux = explode(".", $key);
                    if($aux[1] == "" && $cont > 2) {?> <option value="<?php echo $key ?>" <?php if($_POST["dir"] == $key) echo "selected" ?>><?php echo $key ?></option>;
                    <?php
                    }
                    $cont++;
                }
            ?>
        </select>
        <input type="submit" name="hey" value="hey" style="display: none">
    </form>
    <form action="ejercicio3.php" method="post" enctype="multipart/form-data">
        <?php
        if(isset($_POST["hey"])){
            $url = "./".$_POST["dir"]."/";
            echo "<p>$url</p>";
            $cont = 0;
            $ficheros1  = scandir($url);
            foreach ($ficheros1 as $key) {
                if($cont >= 2)echo "<option value=\"".$key."\">".$key."</option>";
                $cont++;
            }
        }
        if(isset($_GET["err"])){
            if($_GET["err"] == 1) echo "<p style=\"color: red;\">Introduce una imagen!</p>";
        }
        ?>
        
        <select name="img">
            <?php
                if(isset($_POST["dir"])){
                    $url = "./".$_POST["dir"]."/";
                    echo "<p>$url</p>";
                    $cont = 0;
                    $ficheros1  = scandir($url);
                    foreach ($ficheros1 as $key) {
                        if($cont >= 2)echo "<option value=\"".$key."\">".$key."</option>";
                        $cont++;
                    }
                }else{
                    echo "<option value=\"\"></option>";
                }
                
            ?>
        </select>
        
        <br>
        <input type="number" name="border">
        <label for="alto">ancho</label>
        <input type="number" name="ancho">
        <label for="ancho">alto</label>
        <input type="number" name="alto">
        <input type="submit" name="enviar" value="enviar">
    </form>
    <?php
        }
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const dir = document.querySelector(".dir");
            const form = document.querySelector("#chulo");
            dir.addEventListener("change", (e) => {
                const clase = e.target.value;
                form.submit();  
            })
        })
    </script>
</body>
</html>