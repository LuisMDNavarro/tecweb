<?php 
namespace API\DATABASE;
abstract class DataBase {
    protected $response;
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
    public function getResponse(){
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
?>