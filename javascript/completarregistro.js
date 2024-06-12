$(document).ready(function() {
    var formData = new FormData();
    var storedFormData = JSON.parse(localStorage.getItem('formData'));
    for (var key in storedFormData) {
        formData.append(key, storedFormData[key]);
    }
    
    $.ajax({
        url: '../registroinicio/registrocompleto.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data['mensaje'] === 'ok') {
                window.location.href = '../principal/index.php';
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data['mensaje'],
                    icon: 'error'
                })}
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            alert('Ha ocurrido un error al procesar la solicitud.');
        }
    });
});
