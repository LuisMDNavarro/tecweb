<?php
require_once __DIR__ . '/API/Productos.php';
use PRODUCTOS\POO\Productos as Productos;

$producto = file_get_contents('php://input');
$editar = new Productos('marketzone');
$editar->add($producto);
echo $editar->getResponse();
?>