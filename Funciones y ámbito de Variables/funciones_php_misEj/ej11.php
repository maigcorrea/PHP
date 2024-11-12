<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function comprobarUsuario($user){
            if(preg_match("'(?!.*[\.\,\*\?\!]).'",$user)){
                echo "Correcto";
            }else{
                echo "El usuario tiene caracteres especiales";
            }
        }

        function sustituirEspacios($palabra){
            $pSust=str_replace(" ","_",$palabra);
            return $pSust;
        }

        function compTamaño($archivo){
            $tMb=$archivo*(2**20);
            
            return $tMb;
        }

        function obtenerTipo($archivo){
            $arr=explode(".",$archivo);
            $ext=end($arr);
            return $ext;
        }

        function compCarpeta($carpeta){
            if(!file_exists($carpeta)){
                mkdir($carpeta);
            }

            return $carpeta;
        }

        function guardar($carpeta,$usuario,$archivo1,$archivo2){
            $formatoFecha=date("HisdmY");
            comprobarUsuario($usuario);
            $carpeta="./$usuario$formatoFecha";
            compCarpeta($carpeta);

        }

        echo(sustituirEspacios(" hola mundo"));
    ?>
</body>
</html>