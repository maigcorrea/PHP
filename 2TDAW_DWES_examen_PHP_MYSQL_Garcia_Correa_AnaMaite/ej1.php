<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $bd=new MySqli("Localhost","root","","examen_biblio");
        if($bd){
            echo "Conexión establecida";
        }

        require_once "clases.php";

        if(isset($_POST["cop"])){
            //Comprobar que la fecha no sea posterior
            $sActuales=time();
            $sFecha=strtotime($_POST["fecha"]);

            if($sFecha<=$sActuales){
                $copia=new Copia($bd);
                $idCopia=$copia->seleccionarID($_POST["libros"]);

                $copia2=new Copia($bd,$_POST["libros"],$idCopia,$_POST["fecha"]);
                $copia2->insertarCopia();
            }else{
                echo "La fecha no puede ser futura";
            }
        }else{
    ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <select name="libros" id="">
                <option value="" disabled selected>Selecciona un libro</option>
                <?php
                    $libro=new Libro($bd);
                    $listaLibros=$libro->getLibros();
                    foreach ($listaLibros as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                ?>
            </select>
            <label for="fecha">Introduce la fecha</label><br>
            <input type="date" name="fecha" id=""><br>

            <input type="submit" value="Enviar" name="cop">

        </form>
    <?php
        }
    ?>
</body>
</html>