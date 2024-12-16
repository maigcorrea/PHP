<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Libro{
            private $bd;
            private $id;
            private $titulo;
            private $autor;
            private $categoria;


            public function __construct(MySqli $db, $tit="", $aut=0, $categ=0){
                $this->bd=$db;
                $this->titulo=$tit;
                $this->autor=$aut;
                $this->categoria=$categ;
            }



            public function getLibros(){
                $sent="SELECT ID, Titulo from Libros";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($this->id, $this->titulo);
                $cons->execute();

                $lista=[];
                while($cons->fetch()){
                    $lista[$this->id]=$this->titulo;
                }

                $cons->close();
                return $lista;
            }


        }


        class Copia{
            private $bd;
            private $idLibro;
            private $idCopia;
            private $fecha;


            public function __construct(MySqli $db, $idL=0, $idC=0, $fec=""){
                $this->bd=$db;
                $this->idLibro=$idL;
                $this->idCopia=$idC;
                $this->fecha=$fec;
            }


            public function seleccionarId($id){
                $sent="SELECT c.id_copia FROM copias_libros c, libros l WHERE c.id_libro=?;";

                $cons=$this->bd->prepare($sent);
                $cons->bind_param("i",$id);
                $cons->bind_result($this->idCopia);
                $cons->execute();

                $idCopias=[];
                while($cons->fetch()){
                    $idCopias[]=$this->idCopia;
                }

                $ultimoId=end($idCopias);
                $nuevoId=$ultimoId+1;

                $cons->close();
                return $nuevoId;
            }



            public function insertarCopia(){
                $sent="INSERT INTO copias_libros VALUES(?,?,?);";

                $cons=$this->bd->prepare($sent);
                $cons->bind_param("iis",$this->idLibro,$this->idCopia,$this->fecha);
                $cons->execute();

                $cons->close();
            }
        }


        class Usuario{
            private $bd;
            private $dni;
            private $nombre;
            private $apellidos;
            private $fecha;

            public function __construct(MySqli $db,$d="",$nom="",$ape="",$fec=""){
                $this->bd=$db;
                $this->dni=$d;
                $this->nombre=$nom;
                $this->apellidos=$ape;
                $this->fecha=$fec;
            }

            public function getLista(){
                $sent="SELECT DNI, Nombre from Usuarios";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($this->dni, $this->nombre);
                $cons->execute();

                $lista=[];
                while($cons->fetch()){
                    $lista[$this->dni]=$this->nombre;
                }

                $cons->close();
                return $lista;
            }
        }


        class Prestamo{
            private $bd;
            private $usuario;
            private $libro;
            private $copia;
            private $fecha_prestamo;
            private $fecha_devolucion;
            private $estado;

            public function __construct(MySqli $db, $usu="", $lib=0, $fp="", $fd=""){
                $this->bd=$db;
                $this->usuario=$usu;
                $this->libro=$lib;
                $this->fecha_prestamo=$fp;
                $this->fecha_devolucion=$fd;
            }


            public function insertarPrestamo(){
                //Se inserta el prestamo
                $sent="INSERT INTO prestamos VALUES ()";
            }

            public function getNoPrestados(){
                //0 es que está prestado
                $sent="SELECT l.ID, l.Titulo from Libros l, Prestamos p WHERE l.ID=p.libro AND p.estado='1'";

                $cons=$this->bd->prepare($sent);
                $cons->bind_result($this->id, $this->titulo);
                $cons->execute();

                $lista=[];
                while($cons->fetch()){
                    $lista[$this->id]=$this->titulo;
                }

                $cons->close();
                return $lista;
            }

            public function sacarDatos(){
                public function getNoPrestados(){
                    //0 es que está prestado
                    $sent="SELECT l.Titulo, u.nombre, p.fecha_devolucion from Libros l, Prestamos p, Usuarios u WHERE l.ID=p.libro AND u.DNI=p.usuario AND p.estado='0'";
    
                    $cons=$this->bd->prepare($sent);
                    $cons->bind_result($this->id, $this->titulo);
                    $cons->execute();
    
                    $lista=[];
                    while($cons->fetch()){
                        $lista[$this->id]=$this->titulo;
                    }
    
                    $cons->close();
                    return $lista;
                }
            }


        }
    ?>
</body>
</html>