<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function es_mayus( $char ){
            return $char >= 'A' && $char <= 'Z';
        }

        function corregir_primera_letra ( &$cad ){
            if(preg_match("'^[a-z]'", $cad)){
                $cad[0] = strtoupper($cad[0]);
            }
        }

        function corregir_mayusculas( &$cad ){
            corregir_primera_letra($cad);
            
            $tope = strlen($cad);
            for($i = 1; $i < $tope; $i++){
                if(es_mayus($cad[$i])) $cad[$i] = strtolower($cad[$i]);
            }
        }

        function contar_letra ( $text, $letra, $css=true ){
            if(!$css){
                $text = strtolower($text);

                if(es_mayus($letra)) $letra = strtolower($letra);
            }

            $tope = strlen($text);
            $cont = 0;

            for($i = 0; $i < $tope; $i++){
                if($text[$i] == $letra) $cont++;
            } 

            return $cont;
            
        }

        function contar_letra_a( $cad ){
            return contar_letra( $cad, 'a' );
        }

        function contar_mayusculas( $cad ){
            $cont = 0;
            $tope = strlen($cad);

            for($i = 0; $i < $tope; $i++) if(es_mayus($cad[$i])) $cont++;

            return $cont;
        }

        

        if(isset($_POST["envio"])){ 
            $css = false;
            if(isset($_POST["case"])) $css = true;
            

            echo "La cadena tiene ".contar_letra($_POST["texto"], $_POST["letra"], $css)." ".$_POST["letra"];
        }
        else{
    ?>
        <form action="#" method="post">
            <label for="texto">Introduce la cadena:</label>
            <input type="text" name="texto">
            <br>
            <label for="letra">Introduce la letra:</label>
            <input type="text" name="letra">
            <br>
            <input type="checkbox" name="case" value=true checked>
            <label for="case">¿Case sensitive?</label>
            
            <br>
            <input type="submit" value="Enviar" name="envio">
        </form>
    <?php } ?>
</body>
</html>