    /*===========================================
    CARGANDO LA TABLA DE VENTAS DE PRODUCTOS
    DINAMICAMENTE Y TRADUCIENDOLA AL ESPAÑOL
    ===========================================*/

$('#tablaVentaProductos').dataTable({
    "ajax": "ajax/datatable-ventasProd.ajax.php",
    "deferRender": true,
    "iDisplayLength": 5,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

    }
    
});

/*===========================================
CARGANDO LA TABLA DE VENTAS DE SERVICIOS
 DINAMICAMENTE Y TRADUCIENDOLA AL ESPAÑOL
===========================================*/
$('#tablaVentaServicios').dataTable({
    "ajax": "ajax/datatable-ventasSer.ajax.php",
    "deferRender": true,
    "iDisplayLength": 5,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

    }
    
});

/*===========================================
AGREGANDO PRODUCTOS A LA VENTA
===========================================*/
$("#tablaVentaProductos tbody").on("click", "button.agregarProducto", function(){
    var idProducto = $(this).attr("idProducto");
    
    $(this).removeClass("btn-info agregarProducto");
    $(this).addClass("btn-default");

    var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            var descripcion = respuesta["descripcion"];
            var stock = respuesta["stock"];
            var precio = respuesta["precio_venta"];

            $(".nuevoProducto").append(
                '<div class="row mb-2 ml-1 mr-1">'+
                    '<div class="col-6" style="padding-right:0px">'+

                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text">'+
                                    '<button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'">'+
                                        '<i class="fa fa-times"></i>'+
                                    '</button>'+
                                '</span>'+
                            '</div>'+
                            '<input type="text" class="form-control" id="agregarProducto" name="agregarProducto" value="'+descripcion+'" readonly required>'+

                        '</div>'+

                    '</div>'+

                    '<!-- Cantidad del producto -->'+
                    '<div class="col-3">'+
                        ' <div class="input-group">'+
                            '<div class="input-group-prepend">'+
                            '<input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1"  value="1" stock="'+stock+'" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+


                '<!-- Precio del producto -->'+

                    '<div class="col-3" style="padding-left:0px">'+

                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text">'+

                                    '<i class="fas fa-dollar-sign"></i>'+

                                '</span>'+
                                '<input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto"  value="'+precio+'" readonly required>'+



                            '</div>'+
                        '</div>'+

                    '</div>'+

                    '</div> '


            )
            
           

        }
    });

})
    
/*===========================================
CUANDO CARGUE LA TABLA DE PRODUCTOS AL NAVEGAR EN ELLA
===========================================*/

$("#tablaVentaProductos").on("draw.dt", function(){

    if(localStorage.getItem("quitarProducto") != null){
        var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

        for (var i = 0; i < listaIdProductos.length; i++){

            $("button.recuperarBotonProducto[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
            $("button.recuperarBotonProducto[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-info agregarProducto');

        }
    }
})

/*===========================================
QUITAR PRODUCTOS E LA VENTA Y RECUPERANDO BOTON
===========================================*/
var idQuitarProducto = [];
localStorage.removeItem("quitarServicio");

$(".formularioVenta").on("click", "button.quitarProducto", function(){

        $(this).parent().parent().parent().parent().parent().remove();

        var idProducto = $(this).attr("idProducto");
        /*===========================================
        ALMACENAR ID EN LOCALSTORAGE
        ===========================================*/

        if(localStorage.getItem("quitarProducto") == null){
            idQuitarProducto = [];
        }else{
            
            idQuitarProducto.concat(localStorage.getItem("quitarProducto"))
        }

        idQuitarProducto.push({"idProducto": idProducto});
        localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

        $("button.recuperarBotonProducto[idProducto='"+idProducto+"']").removeClass('btn-default');
        $("button.recuperarBotonProducto[idProducto='"+idProducto+"']").addClass('btn-info agregarProducto');

})


/*===========================================
AGREGANDO SERVICIOS A LA VENTA
===========================================*/
$("#tablaVentaServicios tbody").on("click", "button.agregarServicio", function(){
    var idServicio = $(this).attr("idServicio");
    
    $(this).removeClass("btn-info agregarServicio");
    $(this).addClass("btn-default");

    var datos = new FormData();
    datos.append("idServicio", idServicio);

    $.ajax({
        url: "ajax/servicios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            var servicio = respuesta["servicio"];
           
            var precio = respuesta["precio"];

            $(".nuevoProducto").append(
                '<div class="row mb-2 ml-1 mr-1">'+
                    '<div class="col-6" style="padding-right:0px">'+

                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text">'+
                                    '<button type="button" class="btn btn-danger btn-xs quitarServicio" idServicio="'+idServicio+'">'+
                                        '<i class="fa fa-times"></i>'+
                                    '</button>'+
                                '</span>'+
                            '</div>'+
                            '<input type="text" class="form-control" id="agregarServicio" name="agregarServicio" value="'+servicio+'" readonly required>'+

                        '</div>'+

                    '</div>'+

                    '<!-- Cantidad del servicio (Esto  va en 1 por defecto, se usa solo para productos) -->'+
                    '<div class="col-3">'+
                        ' <div class="input-group">'+
                            '<div class="input-group-prepend">'+
                            '<input type="number" class="form-control"  value="1" readonly required>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+


                '<!-- Precio del servicio -->'+

                    '<div class="col-3" style="padding-left:0px">'+

                        '<div class="input-group">'+
                            '<div class="input-group-prepend">'+
                                '<span class="input-group-text">'+

                                    '<i class="fas fa-dollar-sign"></i>'+

                                '</span>'+
                                '<input type="number" min="1" class="form-control" id="nuevoPrecioServicio" name="nuevoPrecioServicio"  value="'+precio+'" readonly required>'+



                            '</div>'+
                        '</div>'+

                    '</div>'+

                    '</div> '


            )
            
           

        }
    });

})
    


/*===========================================
CUANDO CARGUE LA TABLA DE SERVICIOS AL NAVEGAR EN ELLA
===========================================*/

$("#tablaVentaServicios").on("draw.dt", function(){

    if(localStorage.getItem("quitarServicio") != null){
        var listaIdServicios = JSON.parse(localStorage.getItem("quitarServicio"));
        
        
  

        for (var i = 0; i < listaIdServicios.length; i++){

            
            $("button.recuperarBotonServicio[idServicio='"+listaIdServicios[i]["idServicio"]+"']").removeClass('btn-default');
            $("button.recuperarBotonServicio[idServicio='"+listaIdServicios[i]["idServicio"]+"']").addClass('btn-info agregarServicio');

            

        }
    }
})


/*===========================================
QUITAR SERVICIOS DE LA VENTA Y RECUPERANDO BOTON
===========================================*/

var idQuitarServicio = [];

localStorage.removeItem("quitarServicio");

$(".formularioVenta").on("click", "button.quitarServicio", function(){

        $(this).parent().parent().parent().parent().parent().remove();

        var idServicio = $(this).attr("idServicio");

        /*===========================================
        ALMACENAR ID EN LOCALSTORAGE
        ===========================================*/

        if(localStorage.getItem("quitarServicio") == null){
            idQuitarServicio = [];
        }else{
            idQuitarServicio.concat(localStorage.getItem("quitarServicio"))
        }

        idQuitarServicio.push({"idServicio": idServicio});
        localStorage.setItem("quitarServicio", JSON.stringify(idQuitarServicio));

        $("button.recuperarBotonServicio[idServicio='"+idServicio+"']").removeClass('btn-default');
        $("button.recuperarBotonServicio[idServicio='"+idServicio+"']").addClass('btn-info agregarServicio');

})