<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function compNom (string $nom){
            if(preg_match("'^[a-zA-Z0-9\s]+$'", $nom))
                return true;
            else
                return false; 
        }

        function sust_bar_baj (string &$nom){
            $tope = strlen($nom);
            $aux = "";
            
            for($i = 0; $i < $tope; $i++){
                if($nom[$i] == ' ') $aux .= '_';
                else $aux .= $nom[$i];
            }

            $nom = $aux;
        }

        function tam_arch ($archivo){
            $tam = $archivo["size"] / 2**20;

            return $tam;
        }

        function tipo_arch ($archivo){
            $tipo = explode("/", $archivo["type"])[0];

            return $tipo;
        }

        function folder_exists (string $ruta){
            if(!file_exists($ruta)) mkdir($ruta);
            else return true;
        }

        function funcion_principal ( $par1, $par2 ){
            if(is_string($par1)){
                $nom = $par1;
                $arch = $par2;
                if(compNom($nom)){
                    sust_bar_baj($nom);

                    $ruta = "./".$nom."/";
                    folder_exists($ruta);

                    $arrNom = explode(".", $arch["name"]);

                    $nomArch = $arrNom[0].date("HisdmY").".".$arrNom[1];

                    $ruta .= $nomArch;

                    move_uploaded_file($arch["tmp_name"], $ruta);
                }
            }else{
                echo "El primer archivo es de tipo ".tipo_arch($par1);
                echo "<br>El segundo archivo es de tipo ".tipo_arch($par2);

                if(tam_arch($par1) > tam_arch($par2)) echo "El primer archvo es más grande";
                else echo "<br>El segundo archivo es más grande";
            }
        }

        ?>
</html>