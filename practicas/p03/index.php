<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida

        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '</ul>';
    ?>
    <br>
    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue: </p>
    <p>  $a = "ManejadorSQL";</p>
    <p>$b = 'MySQL'; </p>
    <p>$c = &$a;</p>
    <p>a. Ahora muestra el contenido de cada variable</p>
    <?php
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo $a;
    echo "<br> $b";
    echo "<br> $c";
    ?>
    <p>b. Agrega al código actual las siguientes asignaciones: </p>
    <p>$a = "PHP server";</p>
    <p>$b = &$a;</p>
    <p>c. Vuelve a mostrar el contenido de cada uno</p>
    <?php
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    $a = "PHP server";
    $b = &$a;
    echo $a;
    echo "<br>$b";
    echo "<br> $c";
    unset($a,$b,$c);
    ?>
    <p>d. Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de
    asignaciones</p>
    <p>La variable "c" estaba enlazada a la variable "a" y en el segundo bloque 
    de asignaciones se enlazo lo variable "b" con la variable "a" por lo que al volver a 
    asignar un valor diferente a la variable "a" este afecta las demas</p>
    <br>
    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables (imprime todos los componentes de los
    arreglo):</p>
    <p>$a = “PHP5”;</p>
    <p>$z[] = &$a;</p>
    <p>$b = “5a version de PHP”;</p>
    <p>$c = $b*10;</p>
    <p>$a .= $b;</p>
    <p>$b *= $c;</p>
    <p>$z[0] = “MySQL”;</p>
    <?php
    $a = "PHP5";
    echo "<br>$a<br>";
    $z[] = &$a;
    var_dump($z);
    $b = "5a version de PHP";
    echo "<br>$b";
   @ $c = $b*10;
    echo "<br>$c";
    $a .= $b;
    echo "<br>$a";
   @ $b *= $c;
    echo "<br>$b<br>";
    $z[0] = "MySQL";
    var_dump($z);
    //unset($a,$b,$c);
    ?>
     <br>
    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz $GLOBALS o del modificador global de PHP.</p>
    <?php
    global $a, $b, $c, $z;
    echo "<br>$a<br>";
    var_dump($z);
    echo "<br>$b";
    echo "<br>$c";
    unset($a,$b,$c);
    ?>
    <br>
    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>$a = “7 personas”;</p>
    <p>$b = (integer) $a;</p>
    <p>$a = “9E3”;</p>
    <p>$c = (double) $a;</p>
    <?php
    $a = "7 personas";
    $b = (integer) $a;
    $a = "9E3";
    $c = (double) $a;
    echo 'Valor de $a: '.$a.'<br>';
    echo 'Valor de $b: '.$b.'<br>';
    echo 'Valor de $c: '.$c;
    unset($a,$b,$c);
    ?>
    <br>
    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función var_dump(datos).</p>
    <?php
    $a = TRUE;
    $b = TRUE;
    $c = TRUE;
    $d = FALSE;
    $e = FALSE;
    $f = FALSE;
    var_dump($a, $b, $c, $d, $e, $f);
    unset($a, $b, $c, $d, $e, $f);
    ?>
    <p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
    en uno que se pueda mostrar con un echo:</p>
    <p>$a = “0”;</p>
    <p>$b = “TRUE”;</p>
    <p>$c = FALSE;</p>
    <p>$d = ($a OR $b);</p>
    <p>$e = ($a AND $c);</p>
    <p>$f = ($a XOR $b);</p>
    <?php
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);
    echo $a;
    echo "<br>$b<br>";
    echo is_bool ($c);
    echo "<br>$d<br>";
    echo is_bool($e);
    echo "<br>$f";
    unset($a, $b, $c, $d, $e, $f);
    ?>
    <br>
    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
    <p>a. La versión de Apache y PHP,</p>
    <p>b. El nombre del sistema operativo (servidor),</p>
    <p>c. El idioma del navegador (cliente).</p>
    <?php
    echo 'Versión de Apache y PHP: ';
    echo $_SERVER['SERVER_SIGNATURE'];
    echo 'Nombre del sistema operativo (servidor): ';
    echo $_SERVER['SERVER_NAME'];
    echo '<br>Idioma del navegador (cliente): ';
    echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    ?>
</body>
</html>