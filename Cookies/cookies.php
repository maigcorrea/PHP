<?php
    $n_cookie="usuario";
    $val_cookie="Pepe";
    // setcookie($n_cookie,$val_cookie, time() + (86400 * 30));
    //Para borrar cookies
    setcookie($n_cookie,$val_cookie, time() - (86400 * 30));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset( $_COOKIE[$n_cookie])){
        echo "La cookie se ha generado con el valor ".$_COOKIE[$n_cookie];
    }else{
        echo "La cookie no se ha generado";
    }
    ?>
</body>
</html>