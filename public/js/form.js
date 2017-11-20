$(document).ready(function() {
    if($('#productosfactura').length){
        addProducto();
    }
    if($('#productospedido').length){
        addProductoPedido();
    }

});
/**
 * FACTURA - FACTURA - FACTURA - FACTURA - FACTURA - FACTURA - FACTURA - FACTURA - FACTURA
 */
a = 0;
/**
 * función para añadir los detalles de la factua
 */
function addProducto(){
    a++;
    $.get("productos", function(response){
        
        var tr = document.createElement('tr');
        var options = '<option value="0">Seleccione</option>';
        tr.id = 'detalle'+a;
        for(i = 0; i< response.length; i++){
            options += '<option value="'+response[i].id+'">'+response[i].nombre_producto+'</option>' ;
        }
        document.getElementById('cantidaddetalles').value = a;
        tr.setAttribute('class', 'form-inline');
        tr.innerHTML = '<td width="60" align="center">'+a
        +'</td> <td colspan="1"><select id="select'+a+'" name="select'+a+'" onchange="changeSelect('+a+')" placeholder="Seleccione" class="form-control">'
        + options + '</select> </td>'+
        '<td width="60">'+
        '<input type="number" disabled required id="pesodetalle'+a+'" min="0" name="pesodetalle'+a+'" onchange="updatePrecios('+a+')" style="width: 90px;" class="form-control"/>'+
        '</td>'+
        '<td width="60">'+
        '<input type="number" disabled required id="cantidaddetalle'+a+'" min="0" name="cantidaddetalle'+a+'" style="width: 90px;" class="form-control"/>'+
        '</td>'+
        '<td>'+
        '<input type="number" id="preciodetalle'+a+'" readonly="readonly" name="preciodetalle'+a+'" placeholder="0" style="width: 90px;" class="form-control"/>'+
        '</td>'+
        '<td><a id="btn-borrar' + a + '" class="btn btn-danger" onclick="deleteProducto(' + a + ')"> <i class="fa fa-minus fa-3" aria-hidden="true"></a></td>';
        document.getElementById('productosfactura').appendChild(tr);document.getElementById('productosfactura').appendChild(tr);
    })
}


/**
 * función para calcular el total de la factura
 */
function calcularTotal(){
    total = 0;
    for(i = 1; i <= a; i++){
        if($('#detalle' + i).length){
            total += parseFloat(document.getElementById('preciodetalle'+i).value);
        }
    }
    document.getElementById('total').value = total;
}
/**
 * función para obtener el nombre de un productp
 * @param {*} id 
 */
function nombreProducto(id){
    $.get("producto/"+idproducto+"", function(response){
        return response[0].nombre_producto;
    });
}
/**
 * función para actualizar los precios de los detalles de la factua
 * @param {*} id fila a actualizar
 */
function updatePrecios(id){
    idproducto = document.getElementById('select'+ id).value;
    $.get("producto/"+idproducto+"", function(response){
        console.log(response);
        var precioporgramo = response[0].precio_por_gramo;
        var peso = $('#pesodetalle' + id).val();
        var precio = precioporgramo * peso;
        document.getElementById('preciodetalle'+id).value = precio;
        calcularTotal();
    });
}
/**
 * función que se activa cuando hay un cambio en el select de alguno de los detalles de factua
 * @param {*} id 
 */
function changeSelect(id){
    if(document.getElementById('cantidaddetalle'+ id).disabled){   
        document.getElementById('cantidaddetalle'+ id).disabled = false;       
        document.getElementById('pesodetalle'+ id).disabled = false;
    }else{
        updatePrecios(id);
    }
}
/**
 * función que elimina un detalle de la factua
 * @param {*} id 
 */
function deleteProducto(id) {
    $('#detalle' + id).remove();
    calcularTotal();
}
/**
 * función que guarda la factura
 */
async function guardar(){
    var nombrecomprador = $("#comprador").val();
    var fechafactura = $("#fecha").val();
    var route = "guardar";
    var token = $("#token").val();
    var totalfactura = document.getElementById('total').innerHTML;
    idfactura = 0;
    await $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {comprador: nombrecomprador, fecha: fechafactura, total: totalfactura},
        success: function(response){
            idfactura = response;
            guardardetalle(response);
        }
    });
    
    window.location=idfactura;
}
/**
 * función que guarda los detalles de la factura
 * @param {*} id 
 */
function guardardetalle(id){
    var token = $("#token").val();
    for(i = 1; i <= a; i++){
        if($('#detalle' + i).length){
                $.ajax({
                url: "guardardetalle",
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data: { id_detalle: i,
                        peso_gramo: parseFloat($("#pesodetalle"+i).val()),
                        precio: parseFloat(document.getElementById('preciodetalle'+i).innerHTML), 
                        cantidad: parseFloat($("#cantidaddetalle"+i).val()),
                        id_factura: id,
                        id_tipo_producto: document.getElementById('select'+ i).value},
                success: function (){
                }
            });
        }
    }
}

function imprimir(id){
    console.log(id);
    $.get("imprimirfactura/"+id, function(response){
        console.log(response);
    });       
}
/*
 * PEDIDO - PEDIDO - PEDIDO - PEDIDO - PEDIDO - PEDIDO - PEDIDO - PEDIDO - PEDIDO - PEDIDO - 
*/

function addProductoPedido(){
    a++;
    $.get("productosp", function(response){
        
        var tr = document.createElement('tr');
        var options = '<option value="0">Seleccione</option>';
        tr.id = 'detalle'+a;
        for(i = 0; i< response.length; i++){
            options += '<option value="'+response[i].id+'">'+response[i].nombre_producto+'</option>' ;
        }

        tr.setAttribute('class', 'form-inline');
        tr.innerHTML = '<td width="60" align="center">'+a
        +'</td> <td colspan="1"><select id="select'+a+'" name="select'+a+'" onchange="changeSelectPedido('+a+')" placeholder="Seleccione" class="form-control">'
        + options + '</select> </td>'+
        '<td width="60">'+
        '<input type="number" disabled id="cantidaddetalle'+a+'" name="cantidad'+a+'" placeholder="0" style="width: 90px;"class="form-control"/>'+
        '</td>'+
        '<td><a id="btn-borrar' + a + '" class="btn btn-danger" onclick="deleteProducto(' + a + ')">X</a></td>';
        document.getElementById('productospedido').appendChild(tr);document.getElementById('productospedido').appendChild(tr);
    })
}

function changeSelectPedido(id){
    if(document.getElementById('cantidaddetalle'+ id).disabled){   
        document.getElementById('cantidaddetalle'+ id).disabled = false; 
    }
}

async function guardarPedido(){
    var nombrecomprador = $("#nombre").val();
    var route = "guardarp";
    var token = $("#token").val();
    var direccionp = $("#direccion").val();
    await $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {nombre: nombrecomprador, direccion: direccionp},
        success: function(response){
            idfactura = response;
            guardardetallepedido(response);
        }
    });
    
    window.location=idfactura;
}

function guardardetallepedido(id){
    var token = $("#token").val();
    for(i = 1; i <= a; i++){
        if($('#detalle' + i).length){
                $.ajax({
                url: "guardardetallep",
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data: { id_detalle: i,
                        cantidad: parseFloat($("#cantidaddetalle"+i).val()),
                        id_pedido: id,
                        id_tipo_producto: document.getElementById('select'+ i).value},
                success: function (){
                }
            });
        }
    }
}