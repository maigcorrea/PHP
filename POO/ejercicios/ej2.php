<?php
    class vehiculo{
        private $nombre;
        private $tipo;
        private $peso;

        public function __construct($no,$t,$p){
            $this->nombre=$no;
            $this->tipo=$t;
            $this->peso=$p;
        }

        // SET
        // public function setNombre($n){
        //     $this->nombre=$n;
        // }

        // public function setTipo($t){
        //     $this->tipo=$t;
        // }

        // public function setPeso($p){
        //     $this->peso=$p;
        // }

        public function __set($algo,$valor){
            $this->algo=$valor;
        }

        // GET
        public function __get($algo){
            return $this->$algo;
        }

        //COMPROBAR TIPO VEHICULO
        public function comprobarTipo(){
            $tipoCoche="";
                switch ($this->tipo) {
                    case 'T':
                        $tipoCoche="Turismo";
                        break;
                    case 'C':
                        $tipoCoche="Camión";
                        break;
                    case 'M':
                        $tipoCoche="Motocicleta";
                        break;
                }

            return $tipoCoche;
            
        }


        public function __toString(){
            $str = "El vehiculo es ".$this->nombre.". Es un ".$this->comprobarTipo()." y pesa ".$this->peso;
            return $str;
        }

    }

    if(isset($_POST["env"])){
        $veh1=new vehiculo($_POST["nom1"],$_POST["tip1"],$_POST["pes1"]);
        $veh2=new vehiculo($_POST["nom2"],$_POST["tip2"],$_POST["pes2"]);

        //Comprobar tipo de los vehiculos
        if($veh1->__get("tipo") == $veh2->__get("tipo")){
            if($veh1->__get("peso") == $veh2->__get("peso")){
                echo "Ambos vehículos pesan lo mismo";
            }else if($veh1->__get("peso") >= $veh2->__get("peso")){
                echo $veh1;
            }else{
                echo $veh2;
            }
        }else{
            echo "No son del mismo tipo";
        }

    }else{
        echo '
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="nom1">Introduce el nombre de modelo del vehículo 1:</label><br>
                <input type="text" name="nom1" id="">
                <label for="tip1">Introduce el tipo de vehículo:</label><br>
                Turismo<input type="radio" name="tip1" value="T"><br>
                Camión<input type="radio" name="tip1" value="C"><br>
                Motocicleta<input type="radio" name="tip1" value="M"><br>
                <label for="pes1">Introduce el peso en toneladas del vehículo</label><br>
                <input type="text" name="pes1" id=""><br><br><br>


                <label for="nom2">Introduce el nombre de modelo del vehículo 2:</label><br>
                <input type="text" name="nom2" id="">
                <label for="tip2">Introduce el tipo de vehículo:</label><br>
                Turismo<input type="radio" name="tip2" value="T"><br>
                Camión<input type="radio" name="tip2" value="C"><br>
                Motocicleta<input type="radio" name="tip2" value="M"><br>
                <label for="pes2">Introduce el peso en toneladas del vehículo</label><br>
                <input type="text" name="pes2" id=""><br>

                <input type="submit" value="Enviar" name="env">
            </form>
        ';
    }
?>