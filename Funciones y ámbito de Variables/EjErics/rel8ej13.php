<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "rel8ej12.php";
        //https://es.wikipedia.org/w/api.php?action=opensearch&prop=extracts&format=json&formatversion=2&srwhat=title&search=perro

        function busqueda_wiki( string $busq ){
            $url = "https://es.wikipedia.org/w/api.php?action=opensearch&prop=extracts&format=json&formatversion=2&srwhat=title&search=".$busq;

            $cr = curl_init();
            curl_setopt( $cr, CURLOPT_URL, $url );
            curl_setopt( $cr, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $cr, CURLOPT_USERAGENT, "Mi pagina (localhost)" );

            $res = curl_exec( $cr );

            curl_close( $cr );

            $arr = explode(",[", $res);

            $titulos = explode(",", $arr[1]);
            $enlaces = explode(",", $arr[3]);

            $tope = count($titulos);

            for($i = 0; $i < $tope; $i++){
                $titulos[$i] = limpiar_chars( $titulos[$i], "]", 0);
                $titulos[$i] = limpiar_chars( $titulos[$i], "\"", 0);
                
                $enlaces[$i] = limpiar_chars( $enlaces[$i], "]", 0);

                echo "<a href=".$enlaces[$i].">".$titulos[$i]."</a><br>";
            }
        }

        if(isset($_POST["env"])){
            $arr = explode(" ", $_POST["busq"]);

            foreach($arr as $val){
                busqueda_wiki($val);
                echo "<br>";
            }

        }else{
    ?>

       <form action="#" method="post">
            <label for="busq">Introduce los términos de búsqueda.</label>
            <br>
            <input type="text" name="busq">
            <br>
            <input type="submit" value="Enviar" name="env">
       </form>     

    <?php } ?>
</body>
</html>