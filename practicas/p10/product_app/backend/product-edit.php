<?php
use API\Update\Actualizar;
require_once __DIR__ . '/API/Productos.php';

$producto = file_get_contents('php://input');
$editar = new Actualizar('marketzone');
$editar->edit($producto);
echo $editar->getResponse();
?>