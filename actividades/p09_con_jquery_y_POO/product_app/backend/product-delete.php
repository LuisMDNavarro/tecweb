<?php
require_once __DIR__ . '/API/Productos.php';
use PRODUCTOS\POO\Productos as Productos;

$productos = new Productos('marketzone');
$productos->delete($_POST['id']);
echo $productos->getResponse();
?>