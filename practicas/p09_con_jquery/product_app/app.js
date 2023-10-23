// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
   // listarProductos();
}

$(document).ready(function(){

    //console.log('jQuery is working');
    $('#product-result').hide();
    fetchProductos();

    $('#search').keyup(function(e){

        if($('#search').val()) {
                
            let search = $('#search').val();

            // console.log(search);
    
            $.ajax({
                url: 'backend/product-search.php',
                type: 'GET', 
                data: {search},
                success: function(response){
                    // console.log(response);
                    let productos =JSON.parse(response);
                    //console.log(productos);
                    let template = '';
                    let templateAll = ''; 
    
                    productos.forEach(producto => {
                        template += `<li>
                        ${producto.nombre}
                        </li>`
                    });
                    //console.log(template);
    
                    $('#container').html(template);
                    //console.log(container);
                    $('#product-result').show();

                    productos.forEach(producto => {
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                        templateAll += `
                        <tr productId="${producto.id}">
                                    <td>${producto.id}</td>
                                    <td>${producto.nombre}</td>
                                    <td><ul>${descripcion}</ul></td>
                                    <td>
                                        <button class="product-delete btn btn-danger">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>`
                    });
                    $('#products').html(templateAll);
                }
    
            })
        }

    });

    $('#product-form').submit(function(e){
        //console.log('submiting');
        let datos = JSON.parse( $('#description').val());
        const postData = {
            nombre: $('#name').val(),
            precio: datos["precio"],
            unidades: datos["unidades"],
            modelo: datos["modelo"],
            marca: datos["marca"],
            detalles: datos["detalles"],
            imagen: datos["imagen"],
            id: $('#product_Id').val()
        };
        //console.log(postData);

        productoJSON = JSON.stringify(postData, null, 2);

        $.post('backend/product-add.php', productoJSON, function (response) {
            //console.log(response);
            let res = JSON.parse(response);
            fetchProductos();
            //$('#product-form').trigger('reset');
            let mensaje = res.message;
            let estado = res.status;
           // console.log(mensaje);
           alert('Estado: '+ estado + ', Mensaje: ' + mensaje);
           // alert(mensaje);
        });
        e.preventDefault();
    });

    function fetchProductos(){
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET',
            success: function (response) {
                //console.log(response);
                let productos = JSON.parse(response);
                let template = '';
                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: '+producto.precio+'</li>';
                    descripcion += '<li>unidades: '+producto.unidades+'</li>';
                    descripcion += '<li>modelo: '+producto.modelo+'</li>';
                    descripcion += '<li>marca: '+producto.marca+'</li>';
                    descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    template += `
                    <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>`
                });
                $('#products').html(template);
                //console.log(products);
            }
        })
    }

    $(document).on('click', '.product-delete', function(){
        
        if(confirm('Quieres elimnar el producto?')) {
            //console.log('click');
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
       // console.log(id);
       $.post('backend/product-delete.php', {id}, function (response) {
        //console.log(response);
        fetchProductos();
        let res = JSON.parse(response);
            let mensaje = res.message;
            let estado = res.status;
           alert('Estado: '+ estado + ', Mensaje: ' + mensaje);
       })
        }

    })


});