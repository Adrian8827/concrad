
$(document).ready(function(){
    listar();
});

var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
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

var listar = function(){
    var table = $('#example').DataTable({
  
    "ajax":"http://localhost/concrad/index.php/banco/mostrartodos",
        "aoColumns": [
        {"data": "clave"},
        {"data": "nombre_corto"},
        {"data": "banco"},
        {"defaultContent": "<button type='button' class='editar btn btn-primary'  onclick='showeditar()' ><i class='fas fa-edit'></i></button>"
        }    
         ],
         "language": idioma_espanol
    });
    obtener_id_eliminar("#example tbody", table);
    obtener_id_editar("#example tbody", table);


}

function showagregar()
{
    tipo = 'agregar';
    $('#formbanco')[0].reset(); 
    $('#modalbanco').modal('show'); 
    $('.modal-title').text('Agregar Banco');
}

function guardar()
{
    $('#btnguardar').text('Guardando...');
    $('#btnguardar').attr('disabled',true);
    var url;
    if(tipo == 'agregar') {
        url = "http://localhost/concrad/index.php/banco/agregar";
    } else {
        url = "http://localhost/concrad/index.php/banco/editar";
    }
    var formData = new FormData($('#formbanco')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) 
            {
                $('#modalbanco').modal('hide');
                $('#example').DataTable().ajax.reload();
                Swal.fire({
                  type: 'success',
                  title: 'Guardado',
                  text: 'El registro se guardo correctamente!'
                });
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                }
            }
            $('#btnguardar').text('Guardar');
            $('#btnguardar').attr('disabled',false);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error al agregar');
            $('#btnSave').text('Guardar');
            $('#btnSave').attr('disabled',false);

        }
    });
}


function showeditar()
{
    tipo = 'editar';
    $('#modalbanco').modal('show'); 
    $('.modal-title').text('Editar datos de banco');
   

}

 var obtener_id_eliminar = function(tbody, table){
    $(tbody).on("click", "button.eliminar", function(){
        var data = table.row( $(this).parents("tr") ).data();
        var clave = $("#clave").val( data.clave );
    });
}


var obtener_id_editar = function(tbody, table){
    $(tbody).on("click", "button.editar", function(){
        var data = table.row( $(this).parents("tr") ).data();
        var clave = $("#clave").val( data.clave );
        var nombre_corto = $("#nombre_corto").val( data.nombre_corto );
        var banco = $("#banco").val( data.banco );
        var id = $("#id_edit").val( data.id );
    });
}
