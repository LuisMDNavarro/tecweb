<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        
        $result = $conexion->query("SELECT * FROM productos WHERE nombre = '$jsonOBJ->nombre' AND eliminado = 0 ");
        if ( $result->num_rows ==0) {
            $insert = "INSERT INTO productos VALUES (null, '$jsonOBJ->nombre',  '$jsonOBJ->marca', '$jsonOBJ->modelo', '$jsonOBJ->precio', '$jsonOBJ->detalles', '$jsonOBJ->unidades',  '$jsonOBJ->imagen', 0)";
			if(mysqli_query($conexion, $insert)){
                echo 'Producto insertado';
            } else {
                echo 'No se pudo insertar el producto';
            }
            $result->free();
		} else {
            echo 'El prodcuto ya existe';
        }
		$conexion->close();

        //echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;
    }
?>