$(document).ready(function() {
    $('form').on('submit', function(event) {     
        event.preventDefault(); 
        var formData = new FormData(this); 
        $.ajax({
            url: '../registroinicio/phpiniciosesion.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data['admin']) {
                    window.location.href = data['admin'];
                } else if (data['mensaje'] === 'ok') {
                    window.location.href = '../index.php';
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: data['mensaje'],
                        icon: 'error'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Ha ocurrido un error al procesar la solicitud.');
            }
        });
    });
});
