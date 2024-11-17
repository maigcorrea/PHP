<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php
        function corregir_primera_letra(&$cad){
            if(preg_match("'^[a-z]'",$cad)){
                $cad[0]=strtoupper($cad[0]);
            }
            return $cad;
        }

        

        //EJ 2
        function corregir_mayusculas(&$cad){
            corregir_primera_letra($cad);

            //Sacar la longitud de la cadena e ir recorriendola
            $tope=strlen($cad);
            for($i=1;$i<$tope;$i++){//Se empieza desde 1 porque la pos 0 es la primera letra(la que va en mayúscula)
                if(preg_match("'[A-Z]'",$cad[$i])){//Si la letra es mayúscula, se convierte a minúscula
                    $cad[$i]=strtolower($cad[$i]);
                }
            }
            return $cad;
        }

        //EJ 3
        function contar_letra_a($cad){
            $contador=0;
            $tope=strlen($cad);

            for($i=0;$i<$tope;$i++){
                if($cad[$i]=="a"){
                    $contador++;
                }
            }
            return "En la cadena hay $contador letras \"a\"";
        }

        //EJ 4
        // function es_mayus($char){
        //     return $char>='A' && $char<='Z'; //Devuelve 1 si la letra es Mayúscula
        // }
        
        function contar_mayusculas($pal){
            $cont=0;
            $tope=strlen($pal);

            for($i=0;$i<$tope;$i++){
                if(preg_match("'[A-Z]'",$pal[$i])){
                    $cont++;     
                }
            }

            return "La cadena contiene $cont mayúscula(s)";
        }

        //EJ 5
        function contar_letra($cad,$char,$sensitive=true){
            if(strlen($char)==1){
                if($sensitive=="false"){
                    $cad=strtolower($cad);
                    if(preg_match("'[A-Z]'",$char)){
                        $char=strtolower($char);
                    }
                }

                $cont=0;
                $tope=strlen($cad);

                for($i=0;$i<$tope;$i++){
                    if($cad[$i]==$char){
                        $cont++;
                    }
                }

                return "La cadena tiene $cont '$char'";
            }else{
                return "Se debe introducir 1 caracter";
            }
        }


        if(isset($_POST["env"])){
        
            // echo(corregir_primera_letra($_POST["cad"]));
            // echo(corregir_mayusculas($_POST["cad"]));
            // echo(contar_letra_a($_POST["cad"]));
            // echo (contar_mayusculas($_POST["cad"]));
            echo contar_letra($_POST["cad"],$_POST["char"],$_POST["case"]);

        }else{
            echo '
                 <form action="#" method="post" enctype="multipart/form-data">
                    <label for="cad">Indica una cadena de texto:</label><br>
                    <input type="text" name="cad" id=""><br>
                    <label for="char">Indica un caracter</label><br>
                    <input type="text" name="char" id=""><br>
                    <label for="case">Quieres que la función sea case sensitive?</label><br>
                    No<input type="radio" name="case" value="false"><br>
                    Si<input type="radio" name="case" value="true"><br>
                    <input type="submit" name="env" value="Enviar">
                </form>    
            ';
        }
    ?>
</body>
</html>