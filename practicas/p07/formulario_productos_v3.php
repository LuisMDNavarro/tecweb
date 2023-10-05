<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de productos</title>
    <link rel="stylesheet" href="css/formProductos.css" />
</head>
<?php
            $conexion = new mysqli('localhost', 'root', 'Luis1', 'marketzone');
            $consulta = "SELECT id FROM productos";
            $resultado = $conexion->query($consulta);

            // Cerrar la conexión
            $conexion->close();
            ?>
<body>
    <h1>GameStore</h1>
    <h2>Actualizar producto</h2>
    <p>Ingresa los datos del producto a actualizar</p>
    <form id = "formularioProducto" onsubmit ="" action ="actualizar_producto.php" method ="post">
        <ul> 
            <li><label for ="id">ID:</label><input type ="text" name ="id"  id ="id"  value="<?= !empty($_POST['id'])?$_POST['id']:$_GET['id'] ?>" readonly></li>
            <li><label for ="nombre">Nombre:</label><input type ="text" name ="nombre"  id ="nombre"  value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li>
            <li><label for ="marca">Marca:</label>
            <select id="marca" name="marca">
                <option value="<?= !empty($_POST['marca'])?$_POST['marca']:$_GET['marca'] ?>"><?= !empty($_POST['marca'])?$_POST['marca']:$_GET['marca'] ?></option>
                <option value="Ubisoft">Ubisoft</option>
                <option value="Activision Blizzart">Activision Blizzart</option>
                <option value="Epic Games">Epic Games</option>
            </select></li>
            <li><label for ="modelo">Modelo:</label><input type ="text" name ="modelo"  id ="modelo" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"></li>
            <li><label for ="precio">Precio:</label><input type ="number" name ="precio"  id ="precio" placeholder="Con dos decimales: 0.00" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"></li>
            <li><label for ="detalles">Detalles:</label><input type ="text" name ="detalles"  id ="detalles" value="<?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?>"></li>
            <li><label for ="unidades">Unidades:</label><input type ="number" name ="unidades"  id ="unidades" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"></li>
            <li><label for ="img">Ruta de la imagen:</label><input type ="text" name ="img"  id ="img"  placeholder="Ej: img/imagen.png" value="<?= !empty($_POST['img'])?$_POST['img']:$_GET['img'] ?>"></li>
    </ul>
    <p>
        <input type="submit" value="Registrar">
        <input type="reset">
      </p>
      <p class="alert" id="alert"> </p>
    </form>
    <script>
        const nombre = document.getElementById("nombre");
        const marca = document.getElementById("marca");
        const modelo = document.getElementById("modelo");
        const precio = document.getElementById("precio");
        const detalles = document.getElementById("detalles");
        const unidades = document.getElementById("unidades");
        const img = document.getElementById("img");
        const alertas=document.getElementById("alert");

        regexp = /^[a-zA-Z0-9]+$/;

        formularioProducto.addEventListener("submit", e=>{

            let alert=" "
            entrar = false;

            //Nombre
            if(nombre.value.length < 1){
                alert += "Se requiere ingresar un nombre <br/>";
                entrar = true;
            }
            if(nombre.value.length > 100){
                alert += "El nombre debe tener menos de 100 caracteres <br/>";
                entrar = true;
            }

            //Marca
            if(marca.value.length < 1){
                alert += "Se requiere ingresar una marca <br/>";
                entrar = true;
            }

            //Modelo
            if(modelo.value.length < 1){
                alert += "Se requiere ingresar un modelo <br/>";
                entrar = true;
            }
            if(!regexp.test(modelo.value)){
                alert +="El modelo debe ser alfanumerico <br/>"
            }
            if(modelo.value.length > 25){
                alert += "El modelo ebe tener menos de 25 caracteres <br/>";
                entrar = true;
            }

            //Precio
            if(precio.value.length < 1){
                alert += "Se requiere ingresar un precio <br/>";
                entrar = true;
            }
            if(precio.value < 99.99){
                alert += "El precio debe ser mayor a 99.99 <br/>";
                entrar = true;
            }

            //Detalles
            if(detalles.value.length > 250){
                alert += "Los detalles deben ser menores a 250 caracteres <br/>";
                entrar = true;
            }

            //Unidades
            if(unidades.value.length < 1){
                alert += "Se requiere ingresar unidades <br/>";
                entrar = true;
            }
            if(unidades.value < 0){
                alert += "Las unidades deben ser mayores o igual a 0 <br/>";
                entrar = true;
            }

            //Imagen
            if(img.value.length < 1){
                document.getElementById("img").value='img/imagen.png';
            }

            if(entrar){
                alertas.innerHTML = alert;
                entrar = false;
                e.preventDefault();
            }
            
        })
    </script>
</body>
</html>