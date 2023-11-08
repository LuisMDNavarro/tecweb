<?php
use API\Read\Leer;
 require_once __DIR__ . '/API/Productos.php';
 
$productos = new Leer('marketzone');
$productos->search($_GET['search']);
echo $productos->getResponse();
?>