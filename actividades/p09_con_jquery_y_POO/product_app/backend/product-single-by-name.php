<?php
     require_once __DIR__ . '/API/Productos.php';
     use PRODUCTOS\POO\Productos as Productos;
     
    $productos = new Productos('marketzone');
    $productos->singleByName($_GET['name']);
    echo $productos->getResponse();
?>
