<?php 
namespace API\Delete;
require_once __DIR__ . '/../../DataBase.php';
use API\DATABASE\DataBase as DataBase;
class Eliminar extends DataBase{
    public function __construct($database = 'marketzone'){
        $this->response = array();
        parent::__construct($database);
    }
    public function delete($id){
        $this->response = array(
            'status'  => 'Error',
            'message' => 'La consulta falló'
        );
        // SE VERIFICA HABER RECIBIDO EL ID
        if( isset($id) ) {
            // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
            $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
            if ( $this->conexion->query($sql) ) {
                $this->response['status'] =  "Success";
                $this->response['message'] =  "Producto eliminado";
            } else {
                $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        } 
    }
}
?>