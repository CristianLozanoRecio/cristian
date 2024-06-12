$(document).ready(function() {
    $('form').on('submit', function(event) {

        var botonSubmit = $(this).find(':submit');
        
        if (botonSubmit.val() === "register" || botonSubmit.val() === "buscar") {
            return true;
        }
        event.preventDefault(); 
        var formData = new FormData(this);
        
        formData.append(botonSubmit.attr('name'), botonSubmit.val());
        
        
        $.ajax({
            url: '../adminpag/BDinsertar.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                alert(data.mensaje); 
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Ha ocurrido un error al procesar la solicitud.');
            }
        });
    });
    $('.borrar').on('click', function() {
        var id = $(this).data('id');
        var tipo = $(this).data('tipo');
        var fila = $(this).closest('tr');
        var objetodeldemonio = {};
    
        if (tipo === "id_reserva") {
            objetodeldemonio.id_reserva = id;
        } else if (tipo === 'id_autor') {
            objetodeldemonio.id_autor = id;
        } else if (tipo === 'isbn') {
            objetodeldemonio.isbn = id;
        }else if (tipo === 'usuario') {
            objetodeldemonio.usuario = id;
        }
    
        $.ajax({
            url: '../adminpag/BDinsertar.php',
            type: 'POST',
            data: objetodeldemonio,
            success: function(data) {
                var respuesta = data.mensaje;
                if (respuesta === 'OK') {
                    fila.remove();
                } else {
                    console.log(respuesta);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
    

    $('.actualizar').on('click', function() {
        var fila = $(this).closest('tr');
        var tipo = $(this).data('tipo');
        var id = $(this).data('id');
    
        var formData = new FormData();
    
        if (tipo === 'id_autor') {
            var id_autor_act = fila.find('.id_autor').val();
            var nombre_autor = fila.find('.nombre_autor').val();
            var biografia = fila.find('.biografia').val();
    
            formData.append('id_autor_act', id_autor_act);
            formData.append('nombre_autor', nombre_autor);
            formData.append('biografia', biografia);
    
        } else if (tipo === 'isbn') {
            var isbn_editar = fila.find('.isbn').val();
            var titulo = fila.find('.titulo').val();
            var sinopsis = fila.find('.sinopsis').val();
            var portada_libro = fila.find('.portada_libro')[0].files[0];
            var disponible = fila.find('.disponible').val();
            var ano_publicacion = fila.find('.ano_publicacion').val();
            var tipolibro = fila.find('.tipo').val();
            var publico = fila.find('.publico').val();
            var idioma = fila.find('.idioma').val();
            var autor = fila.find('.autor').val();
            var editorial = fila.find('.editorial').val();
    
            formData.append('isbnANT', id);
            formData.append('isbn_editar', isbn_editar);
            formData.append('titulo', titulo);
            formData.append('sinopsis', sinopsis);
            formData.append('portada_libro', portada_libro);
            formData.append('disponible', disponible);
            formData.append('ano_publicacion', ano_publicacion);
            formData.append('tipolibro', tipolibro);
            formData.append('publico', publico);
            formData.append('idioma', idioma);
            formData.append('autor', autor);
            formData.append('editorial', editorial);
    
        } else if (tipo === 'usuario') {
            var usuario_act = fila.find('.usuario').val();
            var passw_act = fila.find('.passw').val();
            var correo_act = fila.find('.correo').val();
    
            formData.append('correo_act', correo_act);
            formData.append('usuario_act', usuario_act);
            formData.append('passw_act', passw_act);
            formData.append('usuarioANT', id);
        }
    
        $.ajax({
            url: '../adminpag/BDinsertar.php',
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(data) {
                console.log(data);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
