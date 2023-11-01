<?php 
namespace CONEXION\POO;
abstract class DataBase {
    protected $conexion;
    public function __construct($database){
        $this->conexion = @mysqli_connect('localhost', 'root', 'Luis1', $database);
        if(!$this->conexion){
            die('Error al conectar la base de datos');
        }
    }
    public function desconectar(){
        mysqli_close($this->conexion);
    }
}
?>