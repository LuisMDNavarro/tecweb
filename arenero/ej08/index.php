<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once __DIR__ . '/Operacion.php';
    //Se inicializa los valores en 0
    $sum1 = new Suma;
    //Se usan metodos de superclase
    $sum1->setValor1(10);
    $sum1->setValor2(5);
    //Se usa metodo propio
    $sum1->operar();
    //Se vuelve a usar metodo de superclase
    echo 'Resultado = '.$sum1->getResultado().'</br>';

    $res1 = new Resta;
    $res1->setValor1(10);
    $res1->setValor2(5);
    $res1->operar();
    echo 'Resultado = '.$res1->getResultado();
    ?>
</body>
</html>