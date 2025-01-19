<body>
    <form action="../Controlador/index.php" method="post">
        <label for="">Elige la Asignatura:</label><br>
        <!-- <select name="" id=""> -->
    <?php
        if(isset($datosAsig)){
            foreach ($datosAsig as $key => $value) {
                // echo "<option value='$key'>$key</option>";
                // echo "<input type='checkbox' name='' value='dc'>gtrg";
                echo "si";
            }
        }else{
            echo "No hay array";
        }
    ?>
        <!-- </select> -->
         <button>cerq</button>
    </form>
</body>