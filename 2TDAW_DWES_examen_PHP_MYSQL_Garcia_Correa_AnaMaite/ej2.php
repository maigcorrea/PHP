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

        if(isset($_POST["pres"])){
            //Comprobar fecha de devolución
            $sFechaHoy=$time();
            $sFechaDev=$time($_POST["fDel"]);

            if($sFechaDev>=$sFechaHoy){
                //Se inserta el prestamo
            }else{
                echo "La fecha de devolución no puede ser inferior a la de hoy";
            }
        }else{
    ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <select name="usuario" id="">
                <option value="" disabled selected>Selecciona un usuario</option>
                <?php
                    $usuarios=new Usuario($bd);
                    $listaUsuarios=$usuarios->getLista();
                    foreach ($listaUsuarios as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                ?>
            </select><br>
            <select name="libros" id="">
                <option value="" disabled selected>Selecciona un libro</option>
                <?php
                    $libros=new Prestamo($bd);
                    $librosNoPrest=$libros->getNoPrestados();
                    foreach ($librosNoPrest as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                ?>
            </select><br>
            <!-- <label for="cop">Indica el número de copia</label><br>
            <input type="text" name="cop" id=""><br> -->
            <label for="fPres">Esta es la fecha de hoy:</label><br>
            <?php
                $time=time();
                $date=date("d-m-y",$time);
                echo "$date<br>";
            ?>
            <label for="fDel">Indica la fecha de devolución máxima</label><br>
            <input type="date" name="fDel" id=""><br>

            <input type="submit" value="Enviar" name="pres">


        </form>
    <?php
        }
    ?>
</body>
</html>