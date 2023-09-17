<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <?php
    require_once __DIR__.'/p04_funciones.php';
    ?>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            echo multipo($num);
        }
    ?>
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta por: impar, par, impar</p>
    <?php
        echo aleatorios();
    ?>
    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>
    <?php
        if(isset($_GET['dado']))
        {
            $dado = $_GET['dado'];
            echo enteromultipo($dado);
        }
    ?>
    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
    a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice. </p>
    <?php
        echo arreglo();
    ?>
    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
    sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
    bienvenida apropiado. </p>
    <?php
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    if($sexo =="Femenino")
    {
        if($edad >=18 && $edad <= 35)
        {
            echo "Bienvenida, usted está en el rango de edad y el genero permitido.";
        }
        else
        {
            echo "No cumple con la edad requerida";
        }
    }
    else
    {
        echo "No cumple con el sexo solicitado";
    }
    ?>
    <h2>Ejercicio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
    una ciudad. </p>
    <h3>Vehiculo</h3>
    <?php
    $matricula = $_POST["matricula"];
    $datos = array (
        
                //Sedan
                'AAA1111' => array('Auto' => array('marca' => "HONDA",
                'modelo' => 2020, 'tipo' => "sedan"), 'Propietario' => array(
                'nombre' => "Juan Perez",
                'ciudad' => "Puebla, pue.", 
                'direccion' => "C. 63 B Ote.")),
                
                'BBB1111' => array('Auto' => array('marca' => "VOLVO",
                'modelo' => 2019, 'tipo' => "sedan"), 'Propietario' => array(
                'nombre' => "Carlos Juarez", 
                'ciudad' => "Puebla, pue.",
                'direccion' => "C. 12 Sur")),
            
                'CCC1111' => array('Auto' => array('marca' => "NISSAN",
                'modelo' => 2018, 'tipo' => "sedan"), 'Propietario' => array(
                'nombre' => "Enrique Guzman", 
                'ciudad' => "Puebla, pue.",
                'direccion' => "Av. 63-A Ote")),
            
                'DDD1111' => array('Auto' => array('marca' => "FORD",
                'modelo' => 2021, 'tipo' => "sedan"), 'Propietario' => array(
                'nombre' => "Uriel Lopez", 
                'ciudad' => "Puebla, pue.",
                'direccion' => "C. 10 Sur")),
            
                'EEE1111' => array('Auto' => array('marca' => "CHEVROLET",
                'modelo' => 2020, 'tipo' => "sedan"), 'Propietario' => array(
                'nombre' => "Roberto Reyes",
                'ciudad' => "Puebla, pue.", 
                'direccion' => "C. 8 B Sur")),

                //Hachback
                'AAA2222' => array('Auto' => array('marca' => "MERCEDEZ",
                'modelo' => 2022, 'tipo' => "hachback"), 'Propietario' => array(
                'nombre' => "Alfonso Esparza",
                'ciudad' => "Veracruz, Ver.", 
                'direccion' => "Calle Navegantes 327")),
            
                'BBB2222' => array('Auto' => array('marca' => "CHEVROLET",
                'modelo' => 2020, 'tipo' => "hachback"), 'Propietario' => array(
                'nombre' => "Rubi Mendez",
                'ciudad' => "Veracruz, Ver.", 
                'direccion' => "Av Cristóbal Colón")),
                
                'CCC2222' => array('Auto' => array('marca' => "SEAT",
                'modelo' => 2022, 'tipo' => "hachback"), 'Propietario' => array(
                'nombre' => "Maria Perez",
                'ciudad' => "Veracruz, Ver.", 
                'direccion' => "Valencia")),
                
                'DDD2222' => array('Auto' => array('marca' => "RENAULT",
                'modelo' => 2022, 'tipo' => "hachback"), 'Propietario' => array(
                'nombre' => "Noe Juarez",
                'ciudad' => "Veracruz, Ver.", 
                'direccion' => "Av. Ejército Mexicano Ote.")),

                'EEE2222' => array('Auto' => array('marca' => "HYUNDAI",
                'modelo' => 2019, 'tipo' => "hachback"), 'Propietario' => array(
                'nombre' => "Diego Mendoza",
                'ciudad' => "Veracruz, Ver.", 
                'direccion' => "C. Cándido Aguilar 747")),

                //Camioneta
                'AAA3333' => array('Auto' => array('marca' => "SUBARU",
                'modelo' => 2016, 'tipo' => "camioneta"), 'Propietario' => array(
                'nombre' => "Luis Ortega",
                'ciudad' => "Xicohténcatl, tlax.", 
                'direccion' => "Av Independencia 58A")),

                'BBB3333' => array('Auto' => array('marca' => "SUSUKI",
                'modelo' => 2022, 'tipo' => "camioneta"), 'Propietario' => array(
                'nombre' => "Rodrigo Perez",
                'ciudad' => "Xicohténcatl, tlax.", 
                'direccion' => "Av. Tlahuicole")),

                'CCC3333' => array('Auto' => array('marca' => "DODGE",
                'modelo' => 2017, 'tipo' => "camioneta"), 'Propietario' => array(
                'nombre' => "David Ramos",
                'ciudad' => "Xicohténcatl, tlax.", 
                'direccion' => "Guillermo Valle 111")),

                'DDD3333' => array('Auto' => array('marca' => "HONDA",
                'modelo' => 2020, 'tipo' => "camioneta"), 'Propietario' => array(
                'nombre' => "Julian Palacios",
                'ciudad' => "Xicohténcatl, tlax.", 
                'direccion' => "C. Texcaltipac 26")),

                'EEE3333' => array('Auto' => array('marca' => "PEUGEOT",
                'modelo' => 2018, 'tipo' => "camioneta"), 'Propietario' => array(
                'nombre' => "Daniel Toxqui",
                'ciudad' => "Xicohténcatl, tlax.", 
                'direccion' => "Priv. del Nte., Ocotlán")),
            );
            echo "Vehiculo solicitado: ";
            echo "[$matricula] => ";
            print_r($datos[$matricula]); 
            echo '<br>';
            echo '<br>';
            echo "Todos los vehiculos:: ";
            print_r($datos); 
    ?>
</body>
</html>