<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    require_once('./ej1.php');

    if(isset($_POST["env"])){
        if($_POST["tipo"]=="perro"){
            $p=new perro($_POST["nom"],$_POST["color"],$_POST["fn"],$_POST["raza"],$_POST["sexo"]);
            echo($p->__toString());
        }else if($_POST["tipo"]=="delfin"){
            $d=new delfin($_POST["nom"],$_POST["color"],$_POST["fn"],$_POST["long"]);
            echo($d->__toString());
        }
    }else{
        echo '
            <form action="#" method="post" enctype="multipart/form-data">
        <label for="nom">Introduce el nombre del animal</label><br>
        <input type="text" name="nom" id=""><br>
        <label for="color">Introduce su color</label><br>
        <input type="text" name="color" id=""><br>
        <label for="fn">Introduce su fecha de nacimiento</label><br>
        <input type="date" name="fn" id=""><br>
        <label for="tipo">¿Qué tipo de animal es?</label><br>
        Delfin<input type="radio" name="tipo" value="delfin"><br>
        Perro<input type="radio" name="tipo" value="perro"><br>
        Si es perro:<br>
        <label for="raza">Introduce su raza</label><br>
        <input type="text" name="raza" id=""><br>
        <label for="sexo">Introduce su sexo</label><br>
        <input type="text" name="sexo" id=""><br>
        <label for="acc">¿Qué está haciendo?</label><br>
        ladrar<input type="radio" name="acc" value="ladrar"><br>
        dormir<input type="radio" name="acc" value="dormir"><br>
        Si es delfín:<br>
        <label for="long">Indica su longitud</label><br>
        <input type="number" name="long" id=""><br>
        <label for="acc">¿Qué está haciendo?</label><br>
        saltar<input type="radio" name="acc" value="saltar"><br>
        comer<input type="radio" name="acc" value="comer"><br>

        <input type="submit" value="Enviar" name="env">
    </form>
        ';
    }

    ?>
</body>
</html>