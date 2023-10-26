// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

$(document).ready(function(){
    let edit = false;
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
    
            });
        } 
    });

    $('#product-form').submit(function(e){
        //console.log('submiting');
        const postData = {
            nombre: $('#name').val(),
            precio: $('#precio').val(),  
            unidades: $('#unidades').val(),
            modelo: $('#modelo').val(),
            marca: $('#marca').val(),
            detalles: $('#detalles').val(),
            imagen: $('#img').val(),
            id: $('#productId').val()
        };
        console.log(postData);
        let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
        productoJSON = JSON.stringify(postData, null, 2);

        $.post(url, productoJSON, function (response) {
           // console.log(response);
           edit = false;
            let res = JSON.parse(response);
            let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${res.status}</li>
                        <li style="list-style: none;">message: ${res.message}</li>
                    `;
            $('#container').html(template_bar);
            $('#product-result').show();
            fetchProductos();
            $('#product-form').trigger('reset');
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
                                <td>
                                    <a href="#" class="productItem">${producto.nombre}</a>
                                </td>
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
        let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${res.status}</li>
                        <li style="list-style: none;">message: ${res.message}</li>
                    `;
            $('#container').html(template_bar);
            $('#product-result').show();
       })
        }

    })

    $(document). on('click', '.productItem', function(){
       //console.log('Editar');
       let element = $(this)[0].parentElement.parentElement;
       let id = $(element).attr('productId');
       //console.log(id);
       $.post('backend/product-single.php', {id}, function(response) {
        //console.log(response);
        const producto = JSON.parse(response);
        //console.log(producto);
        $('#name').val(producto[0].nombre);
        $('#productId').val(producto[0].id);
        $('#precio').val(producto[0].precio);
        $('#unidades').val(producto[0].unidades);
        $('#modelo').val(producto[0].modelo);
        $('#marca').val(producto[0].marca);
        $('#detalles').val(producto[0].detalles);
        $('#img').val(producto[0].imagen);
        edit = true;
       })
    });
});