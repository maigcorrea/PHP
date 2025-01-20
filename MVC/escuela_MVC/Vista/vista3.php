<body>
    <?php
        if(isset($alumnosExpediente)){
            foreach ($alumnosExpediente as $key => $value) {
                echo "Alumno:".$value["nombre"]." Asignatura:".$value["asignatura"]." Nota:".$value["nota"]."<br>";
            }
        }
    ?>
</body>