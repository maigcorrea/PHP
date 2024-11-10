<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        
    </style>
</head>
<body>
  
    <?php

    $form=$_POST;
    if(isset($_POST["textos"])){
        $imagen=$_FILES["img"];
        $radio=$_POST["rad"];
        $ubi="procesamiento.php";//Almacenamos el nombre del archivo php para luego reenviar los errores

        //Si no ha introducido la foto, que salga un error

        //Si no ha seleccionado un radio, que salga un error
           
        //Si no ha seleccionado un radio ni una foto, que salga un error

           if (!isset($radio)) {
                header("Location: $ubi?err=2");
           };
        
            
        //TABLA
        echo "<div>";
        echo "<table>";
        echo "<tr><th>Cadena Evaluada</th><th>Categorías</th></tr>";
            foreach ($form as $key => $input) {
                $categorias=[]; //Array donde se van a ir almacenando todas las categorias de cada cadena
                
                //Cadena vacia
                if($input==""){
                   $categorias[]="Cadena vacía";
                }
                
                //Cadena única.
                if(preg_match("'\s?+[a-zA-Z]+\s*'",$input)){
                    $categorias[]="Cadena con una única palabra";
                }
                
                
                //Cadena con dos palabras.
                if(preg_match("'\s*[a-zA-Z]+\s+[a-zA-Z0-9]+\s*'",$input)){
                    $categorias[]="Cadena con dos palabras";
                }


                // //Cadena con una enumeración
                if(count(explode(",",$input))>=3){
                    $categorias[]="Cadena enumerada";
                }


                //Cadena con un número decimal
                if(preg_match("'(?<!\d)\d+\.\d+(?!\d)'",$input)){//hola23,14
                    $categorias[]="Cadena con número decimal";
                }

                //Cadena con un único número impar
                if(preg_match("'^[^0-9]*[0-9]*[13579](\.[0-9]+)?[^0-9]*$'",$input)){
                    //^[^0-9]*[0-9]*[13579](\.[0-9]+)?[^0-9]*$
                    $categorias[]="Cadena con un número impar";
                }

                //Número de teléfono
                // ^\+(\d{2})?[6789]\d{8}$ o ^\+([0-9]{2})?[6789][0-9]{8}$
                if(preg_match("'^\+([0-9]{2})?\s?[6789][0-9]{8}$'",$input)){
                    $categorias[]="Número de teléfono";
                }


                //DNI
                if(preg_match("'^[0-9]{8}[A-Z]$'",$input)){
                    $categorias[]="DNI";
                }

                //Contraseña
                //^(?=.*[A-Z])(?=(?:[^0-9]*[0-9]){2})(?=(?:[^!@#$%^&*()_+]*[!@#$%^&*()_+]){3})[A-Za-z0-9!@#$%^&*()_+]{8,20}$
                if(preg_match("'^(?=.*[A-Z])(?=(?:[^0-9]*[0-9]){2})(?=(?:[^!@#$%^&*()_+]*[!@#$%^&*()_+]){3})[A-Za-z0-9!@#$%^&*()_+]{8,20}$'",$input)){
                    $categorias[]="Contraseña";
                    //^(?=.*[A-Z])(?=.*[0-9].*[0-9])(?=.*[^\d^\w^\W].*[^\d^\w^\W].*[^\d^\w^\W])(){8,20}$   BUENA
                }

                if(empty($categorias)){
                    $categorias[]="Formato desconocido";
                }

                if ($key !== "rad" && $key !== "textos") { // Condición para omitir "rad" y "textos"
                    echo "<tr><td>$input</td><td>".implode(",",$categorias)."</td></tr>";//Se hace implode para unir las categorias y separarlas mediante , .Así salen todas las categorias en un único td
                }

                //RESULTADOS DE INPUT RADIO
                $seleccionRadio=$_POST["rad"];//Almaceno el radio seleccionado por el usuario (Almaceno el value, que es el name de los input de tipo texto)
                $valorInput=$_POST[$seleccionRadio];//Almaceno el valor del input de tipo texto que el usuario ha seleccionado en el radio. Es el nuevo nombre que tendrá la imagen

            }
        echo "</table>";
        echo "<div>";

        //GUARDAR LA IMÁGEN Y CAMBIAR EL NOMBRE
        $ruta="./img/";

        if(!file_exists($ruta)){
            mkdir($ruta);
        }

        
        
        $nomOrig=$_FILES["img"]["name"];//El nombre original de la imagen
        


        //Si el nuevo nombre no tiene la extensión, hay que añadirsela para que el archivo se pueda ver correctamente
        
        $extension;
        if(!preg_match("'^[a-zA-Z0-9]+\.[a-z]+$'",$valorInput)){//Si el nuevo nombre no va seguido de . y la extensión, se le añade la extensión del nombre original
            //Se concatena el nombre nuevo que se le va a poner a la imagen con la extensión del nombre original

            $pos = strrpos($nomOrig, '.'); // Encuentra la posición del último punto dentro del nombre original
            $extension=substr($nomOrig,$pos);//substr devuelve una parte del string a partir de una posición, en este caso devuelve una cadena a partir de la posición del . en el nombre original
            $valorInput=$valorInput.$extension;//Se concatena el nuevo nombre con la extensión
        }
        
        $origen=$_FILES["img"]["tmp_name"];
        $destino=$ruta.$valorInput; //Se concatena la ruta donde queremos guardar la imagen con el nuevo nombre


        move_uploaded_file($origen,$destino);

        echo '<img src="'.$ruta.$valorInput.'"<br>';
    }else{

        /* El value de los input de tipo radio es el name de los input de tipo texto, para luego poder almacenar la cadena introducida por el usuario */
        echo '
            <div class="form-container">
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="t1">Introduce el texto 1:</label><br>
                    <input type="text" name="t1" placeholder="Texto 1"><br>
                    <label for="t2">Introduce el texto 2:</label><br>
                    <input type="text" name="t2" placeholder="Texto 2"><br>
                    <label for="t3">Introduce el texto 3:</label><br>
                    <input type="text" name="t3" placeholder="Texto 3"><br>
                    <label for="t4">Introduce el texto 4:</label><br>
                    <input type="text" name="t4" placeholder="Texto 4"><br>
                    <label for="t5">Introduce el texto 5:</label><br>
                    <input type="text" name="t5" placeholder="Texto 5"><br>
                    <label for="t6">Introduce el texto 6:</label><br>
                    <input type="text" name="t6" placeholder="Texto 6"><br>
                    <label for="t7">Introduce el texto 7:</label><br>
                    <input type="text" name="t7" placeholder="Texto 7"><br>
                    <label for="img" class="img">Introduce una imagen:</label><br>
                    <input type="file" name="img" accept="image/*" required><br>
                    <label for="rad" class="form-check-label">Qué cadena quieres seleccionar?:</label><br>
                    Cadena 1:<input type="radio" class="form-check-input bg-black" name="rad" value="t1"><br>
                    Cadena 2:<input type="radio" class="form-check-input bg-black" name="rad" value="t2"><br>
                    Cadena 3:<input type="radio" class="form-check-input bg-black" name="rad" value="t3"><br>
                    Cadena 4:<input type="radio" class="form-check-input bg-black" name="rad" value="t4"><br>
                    Cadena 5:<input type="radio" class="form-check-input bg-black" name="rad" value="t5"><br>
                    Cadena 6:<input type="radio" class="form-check-input bg-black" name="rad" value="t6"><br>
                    Cadena 7:<input type="radio" class="form-check-input bg-black" name="rad" value="t7"><br>';

                    if(isset($_GET["err"])){
                        if($_GET["err"] == 2) echo "<p style=\"color:red\">Selecciona una cadena</p>";
                    }

                    echo '
                    <input type="submit" value="Enviar" name="textos">
                </form>
            </div>
        ';

    
    }

    ?>
</body>
</html>