<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST["env2"])){
            foreach($_POST as $val) echo "$val";

        }else{
    ?>
    <form action="#" method="post" id="check">
        <label for="nom">Introduce el nombre:</label>
        <input type="text" name="nom" <?php if(isset($_POST["nom"])) echo 'echo value="'.$_POST["nom"].'"'; ?>>
        <br>
        <label for="col">Introduce el color:</label>
        <input type="text" name="col" <?php if(isset($_POST["col"])) echo 'echo value="'.$_POST["col"].'"'; ?>>
        <br>
        <label for="sexo">Introduce el sexo:</label>
        <input type="text" name="sexo" <?php if(isset($_POST["sexo"])) echo 'echo value="'.$_POST["sexo"].'"'; ?>>
        <br>
        <label for="tipo">¿Que animal es?</label>
        <select name="tipo" id="t-check" onchange="actualizar()">
            <option value="0">-</option>
            <option value="1" <?php if(isset($_POST["tipo"]) && $_POST["tipo"] == 1) echo 'selected'; ?>>Perro</option>
            <option value="2" <?php if(isset($_POST["tipo"]) && $_POST["tipo"] == 2) echo 'selected'; ?>>Delfín</option>
        </select>
        <br>
        <?php
            if(isset($_POST["tipo"])){
                if( $_POST["tipo"] == 1){
        ?>
                <label for="accion">¿Que hace el perro?</label>
                <select name="accion">
                    <option value="1">Ladrar</option>
                    <option value="2">Dormir</option>
                </select>
                <br>
                
        <?php
                }
                else if($_POST["tipo"] == 2){
        ?>
                <label for="accion">¿Que hace el delfin?</label>
                <select name="accion">
                    <option value="1">Saltar</option>
                    <option value="2">Comer</option>
                </select>
                <br>
        <?php
                }

                echo '<input type="submit" value="Enviar" name="env2">';

            }     
        ?>
    </form>

    <?php } ?>
</body>
</html>

<script>
    function actualizar(){
        document.getElementById('check').submit();
    };
</script>