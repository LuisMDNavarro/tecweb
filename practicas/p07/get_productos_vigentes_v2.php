<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
            $eliminado = 0;
            /** SE CREA EL OBJETO DE CONEXION */
            @$link = new mysqli('localhost', 'root', 'Luis1', 'marketzone');
            /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
    
            /** comprobar la conexión */
            if ($link->connect_errno) 
            {
                die('Falló la conexión: '.$link->connect_error.'<br/>');
                //exit();
            }
    
            /** Crear una tabla que no devuelve un conjunto de resultados */
            if ( $result = $link->query("SELECT * FROM productos WHERE eliminado = 0") ) 
            {
                /** Se extraen las tuplas obtenidas de la consulta */
                $row = $result->fetch_all(MYSQLI_ASSOC);
    
                /** útil para liberar memoria asociada a un resultado con demasiada información */
                $result->free();
            }
    
            $link->close();
        ?>
		<script>
            function show() {
                var rowId = event.target.parentNode.parentNode.id;
                var data = document.getElementById(rowId).querySelectorAll(".row-data");
                var id = data[0].innerHTML;
                var name = data[1].innerHTML;
                var marca = data[2].innerHTML;
				var modelo = data[3].innerHTML;
				var precio = data[4].innerHTML;
				var unidades = data[5].innerHTML;
				var detalles = data[6].innerHTML;
				var imagen = data[7].innerHTML;

				alert("ID: " + id +"\nName: " + name + "\nMarca: " + marca+ "\nModelo: " + modelo+ "\nPrecio: " + precio+ "\nUnidades: " + unidades+ "\nDetalles: " + detalles+ "\nImagen: " + imagen);

                send2form(id,name, modelo,marca,precio,unidades, detalles, imagen);
            }
        </script>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Submit</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                    foreach ($row as $fila) {
					echo "<tr id = '" . $fila['id'] . "'>";
						echo "<th scope='row' class='row-data'>" . $fila['id'] . " </th>";
						echo "<td class='row-data'>" .$fila['nombre']. "</td>";
						echo "<td class='row-data'>".$fila['marca']."</td>";
						echo "<td class='row-data'>" .$fila['modelo'] ."</td>";
						echo "<td class='row-data'>".$fila['precio']."</td>";
						echo "<td class='row-data'>". $fila['unidades']."</td>";
						echo "<td class='row-data'>" .utf8_encode($fila['detalles'])."</td>";
						echo "<td class='row-data'>".$fila['imagen']."</td>";
						echo "<td><input type='button' value='submit' onclick='show()' /></td>";
					echo "</tr>";
                    }
                    ?>
				</tbody>
			</table>
			<script>
            function send2form(id,name, modelo,marca,precio,unidades, detalles, imagen) {
                var form = document.createElement("form");

                var IDIn = document.createElement("input");
                IDIn.type = 'text';
                IDIn.name = 'id';
                IDIn.value = id;
                form.appendChild(IDIn);

                var nombreIn = document.createElement("input");
                nombreIn.type = 'text';
                nombreIn.name = 'nombre';
                nombreIn.value = name;
                form.appendChild(nombreIn);
 
                var marcaIn = document.createElement("input");
                marcaIn.name = 'marca';
                marcaIn.value = marca;
                form.appendChild(marcaIn);

				var modeloIn = document.createElement("input");
                modeloIn.type = 'text';
                modeloIn.name = 'modelo';
                modeloIn.value = modelo;
                form.appendChild(modeloIn);

				var precioIn = document.createElement("input");
                precioIn.type = 'number';
                precioIn.name = 'precio';
                precioIn.value = precio;
                form.appendChild(precioIn);

				var detallesIn = document.createElement("input");
                detallesIn.type = 'text';
                detallesIn.name = 'detalles';
                detallesIn.value = detalles;
                form.appendChild(detallesIn);

				var unidadesIn = document.createElement("input");
                unidadesIn.type = 'number';
                unidadesIn.name = 'unidades';
                unidadesIn.value = unidades;
                form.appendChild(unidadesIn);

				var imagenIn = document.createElement("input");
                imagenIn.type = 'text';
                imagenIn.name = 'img';
                imagenIn.value = imagen;
                form.appendChild(imagenIn);

                console.log(form);

                form.method = 'POST';
                form.action = 'http://localhost/tecweb/practicas/p07/formulario_productos_v3.php';  

                document.body.appendChild(form);
                form.submit();
            }
        </script>
		<?php endif; ?>
	</body>
</html>