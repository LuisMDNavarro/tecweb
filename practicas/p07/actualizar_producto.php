<?php
$id = $_POST['id'];
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

$sql = "UPDATE productos SET  nombre = '$nombre', marca = '$marca', modelo = '$modelo',  precio = '$precio', detalles = '$detalles', unidades = '$unidades', imagen = '$imagen'  WHERE id= $id ";
if(mysqli_query($link, $sql)){
    echo "Registro actualizado.";
   header("Location: http://localhost/tecweb/practicas/p07/get_productos_vigentes_v2.php");
} else {
    echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
}
                
$link->close();
?>