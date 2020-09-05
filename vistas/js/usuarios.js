/*=============================================
	SUBIENDO LA FOTO DEL USUARIO
=============================================*/

$('.nuevaFoto').change(function() {
    var imagen = this.files[0];

    //VALIDANDO FORMATO DE IMAGEN
    if (imagen["type"] != "image/jpg" && imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $('.nuevaFoto').val("");

        swal.fire({
            title: 'Error al subir la imágen',
            text: 'La imágen debe estar en formato JPG o PNG',
            type: 'error',
            confirmButtonText: 'Cerrar'
        });
    } //end if
    else if (imagen["size"] > 2000000) {
        $('.nuevaFoto').val("");

        swal.fire({
            title: 'Error al subir la imágen',
            text: 'La imágen no debe pesar más de 2MB',
            type: 'error',
            confirmButtonText: 'Cerrar'
        });
    } else {
        var datosImagen = new FileReader();
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on('load', function(event) {
            var rutaImagen = event.target.result;
            $('.previsualizar').attr('src', rutaImagen);
        });
    }

}); //END nuevaFoto change

/*=============================================
	EDITAR USUARIO
=============================================*/

$(document).on('click', '.btnEditarUsuario', function() {

    var idUsuario = $(this).attr("idUsuario");


    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            $('#editarNombre').val(respuesta['nombre']);
            $('#editarUsuario').val(respuesta['usuario']);
            $('#editarPerfil').html(respuesta['perfil']);
            $('#editarPerfil').val(respuesta['perfil']);
            $('#fotoActual').val(respuesta['foto']);

            $('#passwordActual').val(respuesta['password']);


            if (respuesta['foto'] != '') {
                $('.previsualizar').attr('src', respuesta['foto']);
            }
        },
        error: function(jqXHR, exception) {
            console.log('AJAX err', ajaxHandleError(jqXHR, exception));
        }


    });
}); //END BUTON CLICK

/*=============================================
ACTIVAR USUARIO
=============================================*/

$(document).on("click", ".btnActivar", function() {

    var idUsuario = $(this).attr('idUsuario');
    var estadoUsuario = $(this).attr('estadoUsuario');
    // alert("js. " + idUsuario);
    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            // console.log('res: ', respuesta);
            if (window.matchMedia('(max-width:767px)').matches) {
                swal.fire({
                    title: 'El usuario ha sido actualizado',
                    type: 'success',
                    cancelButtonText: 'Cerrar'
                }).then(function(result) {
                    window.location = 'usuarios';
                });
            }

        },
        error: function(jqXHR, exception) {
            console.log('AJAX err', ajaxHandleError(jqXHR, exception));
        }
    });

    if (estadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);
    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);
    }
});

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function() {
    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
                $("#nuevoUsuario").val("");
            }
        },
        error: function(jqXHR, exception) {
            console.log('AJAX err', ajaxHandleError(jqXHR, exception));
        }
    });
}); //END NUEVOUSUARIO CHANGE

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarusuario", function() {

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

    swal.fire({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result) {

        if (result.value) {
            window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario + "&usuario=" + usuario + "&fotoUsuario=" + fotoUsuario;
        }

    })

});

/*=============================================
AJAX ERROR LOGIC
=============================================*/
function ajaxHandleError(jqXHR, exception) {
    var msg = '';
    if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
    } else if (jqXHR.status == 404) {
        msg = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
    } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg = 'Time out error.';
    } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
    } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
    }
    return msg;
}