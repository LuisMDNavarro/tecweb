<?php
use API\Create\Crear;
require_once __DIR__ . '/API/Productos.php';


$producto = file_get_contents('php://input');
$editar = new Crear('marketzone');
$editar->add($producto);
echo $editar->getResponse();
?>