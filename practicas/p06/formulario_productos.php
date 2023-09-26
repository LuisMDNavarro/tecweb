<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
    <link rel="stylesheet" href="css/formProductos.css" />
</head>
<body>
    <h1>Registro de producto</h1>
    <p>Ingresa los datos del producto a registrar</p>
    <form id = "formularioProducto" action ="set_producto_v2.php" method ="post">
        <ul> 
            <li><label for ="nombre">Nombre:</label><input type ="text" name ="nombre"  id ="nombre" ></li>
            <li><label for ="marca">Marca:</label><input type ="text" name ="marca"  id ="marca"></li>
            <li><label for ="modelo">Modelo:</label><input type ="text" name ="modelo"  id ="modelo"></li>
            <li><label for ="precio">Precio:</label><input type ="text" name ="precio"  id ="precio"  placeholder="Con dos decimales: 0.00"></li>
            <li><label for ="detalles">Detalles:</label><input type ="text" name ="detalles"  id ="detalles"></li>
            <li><label for ="unidades">Unidades:</label><input type ="text" name ="unidades"  id ="unidades" placeholder="Numeros enteros solamente"></li>
            <li><label for ="img">Nombre con formato de la imagen:</label><input type ="text" name ="img"  id ="img"  placeholder="Sin espacios, ej: imagen.png"></li>
    </ul>
    <p>
        <input type="submit" value="Registrar">
        <input type="reset">
      </p>
    </form>
</body>
</html>