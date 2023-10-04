<?php
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['img'];

@$link = new mysqli('localhost', 'root', 'Luis1', 'marketzone');	

if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

                $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', '{$unidades}', 'img/$imagen', '0')";
                if ( $link->query($sql) ) 
                {
                    echo 'Producto insertado con: ';
                    echo 'ID: '.$link->insert_id.'<br>';
                    echo 'Nombre: '.$nombre.'<br>';
                    echo 'Marca: '.$marca.'<br>';
                    echo 'Modelo: '.$modelo.'<br>';
                    echo 'Precio: '.$precio.'<br>';
                    echo 'Detalles: '.$detalles.'<br>';
                    echo 'Unidades: '.$unidades.'<br>';
                    echo 'Imagen: img/'.$imagen;
                }
                else
                {
	                echo 'El Producto no pudo ser insertado =(';
                }
                
$link->close();
?>