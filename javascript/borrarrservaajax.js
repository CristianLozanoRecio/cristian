$('.borrar').on('click', function() {
    var id = $(this).data('id');
    var fila = $(this).closest('tr');
    objetoreserva = {};
    var isbn = fila.find('.isbn').html();;
    objetoreserva.id = id;
    objetoreserva.isbn = isbn;
    $.ajax({
        url: '../menu/borrarreserva.php',
        type: 'POST',
        data: objetoreserva,
        success: function(data) {
        
                fila.remove();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
});