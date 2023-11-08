<?php
use API\Delete\Eliminar;
require_once __DIR__ . '/API/Productos.php';

$productos = new Eliminar('marketzone');
$productos->delete($_POST['id']);
echo $productos->getResponse();
?>