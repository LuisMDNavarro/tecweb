<?php
function multipo($num){
    if ($num%5==0 && $num%7==0)
    {
        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
    }
    else
    {
        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
    }
}

function aleatorios(){
    $detener = false;
    $matriz = [[],[],[]];
    $contador = 0;

    do{
        $num1 = rand(100, 999);
        $num2 = rand(100, 999);
        $num3 = rand(100, 999);
        if($num1%2 != 0 && $num2%2 ==0 && $num3%2 !=0)
        {
            $detener = true;
        }
        $matriz[0][$contador] = $num1;
        $matriz[1][$contador] = $num2;
        $matriz[2][$contador] = $num3;
        $contador ++;
    }while($detener == false);

    for($i=0; $i<$contador; $i++)
    {
        foreach($matriz as $lista )
        { 
            echo "$lista[$i] ";
        }
        echo "<br>";
    }
    $numeros =$contador * 3;
    echo "$numeros números obtenidos en $contador iteraciones";
}

function enteromultipo($dado){
    $encontrar = rand(0,1000);
    while($encontrar%$dado !=0)
    {
        $encontrar = rand(0,1000);
    }
    echo "El numero usando while es $encontrar";
    echo '<br>';
    do{
        $encontrar = rand(0,1000);
    }while($encontrar%$dado !=0);
    echo "El numero usando do-while es $encontrar";
}
?>