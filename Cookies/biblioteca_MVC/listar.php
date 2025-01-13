<?php
    require_once("cabecera.html");
?>
<body>
    <?php
        foreach ($ej as $key => $value) {
            echo $value;
        }
    ?>
</body>
<?php
    require_once("pie.html");
?>
