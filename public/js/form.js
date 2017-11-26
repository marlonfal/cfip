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
cantidad = 0;
/**
 * función para añadir los detalles de la factua
 */
function addProducto(){
    a++;
    $.get("productos", function(response){
        
        var tr = document.createElement('tr');
        var options = '<option value="">Seleccione</option>';
        tr.id = 'detalle'+a;
        for(i = 0; i< response.length; i++){
            options += '<option value="'+response[i].id+'">'+response[i].nombre_producto+'</option>' ;
        }

        cantidad++;
        document.getElementById('cantidaddetalles').value = cantidad;
        
        tr.setAttribute('class', 'form-inline');
        tr.innerHTML = '<td width="60" align="center">'+a
        +'</td> <td colspan="1"><select required id="select'+a+'" name="select[]" onchange="changeSelect('+a+')" placeholder="Seleccione" class="form-control">'
        + options + '</select> </td>'+
        '<td width="60">'+
        '<input type="number" disabled required id="pesodetalle'+a+'" min="0" name="pesodetalle[]" onchange="updatePrecios('+a+')" style="width: 90px;" class="form-control"/>'+
        '</td>'+
        '<td width="60" align="center">'+
        '<input type="number" disabled required id="cantidaddetalle'+a+'" min="0" name="cantidaddetalle[]" style="width: 90px;" class="form-control"/>'+
        '</td>'+
        '<td align="center">'+
        '<input type="number" id="preciodetalle'+a+'" readonly="readonly" name="preciodetalle[]" placeholder="0" style="width: 90px;" class="form-control"/>'+
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
    cantidad--;
    document.getElementById('cantidaddetalles').value = cantidad;
    calcularTotal();

}
function confirmarventa(){
    var r = 0;
    var nombre = document.getElementById('comprador').value;
    var fecha = document.getElementById('fecha').value;
    if(!nombre || !fecha){
        r = 1;
        $.alert({
            icon: 'fa fa-warning',
            type: 'orange',
            title: 'Formulario incompleto',
            content: 'Completa todos los campos',
        });

    }
    if(r == 0){
        for(i = 1; i <= a; i++){
            if($('#detalle' + i).length){
                r = 0;
                var producto = document.getElementById('select' + i).value;
                var cantidad = document.getElementById('cantidaddetalle' + i).value;
                var pesodetalle = document.getElementById('pesodetalle' + i).value;
                if(!producto || !cantidad || !pesodetalle){
                    r = 1;
                    $.alert({
                        type: 'orange',
                        title: 'Formulario incompleto',
                        content: 'Completa todos los campos',
                    }); 
                }
            }
        }
    }
    if(r == 0){
        $.confirm({
            type: 'green',
            animation: 'zoom',
            icon: 'fa fa-question-circle-o',        
            title: 'Confirmar la venta',
            content: '¿Estás seguro de guardar la venta? NO podrás modificarla después',
            buttons: {
                Cancelar: {
                    btnClass: 'btn-danger',
                },
                Confirmar: {
                    btnClass: 'btn-success',
                    action: function(){
                            document.guardarventa.submit();
                        } 
                },
            }
        });
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
        var options = '<option value="" selected>Seleccione</option>';
        tr.id = 'detalle'+a;
        for(i = 0; i< response.length; i++){
            options += '<option value="'+response[i].id+'">'+response[i].nombre_producto+'</option>' ;
        }

        cantidad++;
        document.getElementById('cantidaddetalles').value = cantidad;

        tr.setAttribute('class', 'form-inline');
        tr.innerHTML = '<td width="60" align="center">'+a
        +'</td> <td colspan="1"><select id="select'+a+'" required="required" name="select[]" onchange="changeSelectPedido('+a+')" placeholder="Seleccione" class="form-control">'
        + options + '</select> </td>'+
        '<td width="60">'+
        '<input type="number" min="1" required disabled id="cantidaddetalle'+a+'" name="cantidad[]" placeholder="0" style="width: 90px;"class="form-control"/>'+
        '</td>'+
        '<td><a id="btn-borrar' + a + '" class="btn btn-danger" onclick="deleteProductoP(' + a + ')"><i class="fa fa-minus"></i></a></td>';
        document.getElementById('productospedido').appendChild(tr);document.getElementById('productospedido').appendChild(tr);
    })
}

function changeSelectPedido(id){
    if(document.getElementById('cantidaddetalle'+ id).disabled){   
        document.getElementById('cantidaddetalle'+ id).disabled = false; 
    }
}

/**
 * función que elimina un detalle del pedido
 * @param {*} id 
 */
function deleteProductoP(id) {
    $('#detalle' + id).remove();
    cantidad--;
    document.getElementById('cantidaddetalles').value = cantidad;
}

function confirmarpedido(){
    var r = 0;
    var nombre = document.getElementById('nombre').value;
    var direccion = document.getElementById('direccion').value;
    var fecha_e = document.getElementById('fecha_entrega').value;
    var hora_e = document.getElementById('hora_entrega').value;
    if(!nombre || !direccion || !fecha_e || !hora_e){
        r = 1;
        $.alert({
            title: 'Formulario incompleto',
            content: 'Completa todos los campos',
        });

    }
    if(r == 0){
        for(i = 1; i <= a; i++){
            if($('#detalle' + i).length){
                r = 0;
                var producto = document.getElementById('select' + i).value;
                var cantidad = document.getElementById('cantidaddetalle' + i).value;
                if(!producto || !cantidad){
                    r = 1;
                    $.alert({
                        type: 'orange',
                        title: 'Formulario incompleto',
                        content: 'Completa todos los campos',
                    }); 
                }
            }
        }
    }
    if(r == 0){
        $.confirm({
            type: 'orange',
            animation: 'zoom',
            icon: 'fa fa-question-circle-o',        
            title: 'Confirmar el pedido',
            content: '¿Estás seguro de hacer el pedido?',
            buttons: {
                Cancelar: {
                    btnClass: 'btn-danger',
                },
                Confirmar: {
                    btnClass: 'btn-success',
                    action: function(){
                            document.crearfactura.submit();
                        } 
                },
            }
        });
    }
}
