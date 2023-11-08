<?php 
namespace API\Update;
require_once __DIR__ . '/../../DataBase.php';
use API\DATABASE\DataBase as DataBase;
class Actualizar extends DataBase{
    public function __construct($database = 'marketzone'){
        $this->response = array();
        parent::__construct($database);
    }
    public function edit($producto){
        $this->response = array(
            'status'  => 'Error',
            'message' => 'No fue posible actualizar'
        );
        if(isset($producto)) {
            // SE TRANSFORMA EL STRING DEL JASON A OBJETO
            $jsonOBJ = json_decode($producto);
            $id = $jsonOBJ->id;
            // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
            $sql = "SELECT * FROM productos WHERE id = {$id}";
            $result = $this->conexion->query($sql);
            if ($result->num_rows != 0) {
                $this->conexion->set_charset("utf8");
                $sql = "UPDATE productos  SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = '{$jsonOBJ->precio}', detalles = '{$jsonOBJ->detalles}', unidades = '{$jsonOBJ->unidades}', imagen = '{$jsonOBJ->imagen}' WHERE id = {$id}";
                if($this->conexion->query($sql)){
                    $this->response ['status'] =  "Success";
                    $this->response['message'] =  "Producto actualizado";
                } else {
                    $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
            $result->free();
            // Cierra la conexion
            $this->conexion->close();
        }
    }
}
?>