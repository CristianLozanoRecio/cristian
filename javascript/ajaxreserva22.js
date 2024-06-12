$('.hora-btn').on('click', function() {
    $('.pop').hide();
    if (correo && numReservas <= 3) {
        var id = $(this).data('id');
        var fecha = $(this).data('fecha');
        var objetoreserva = {};

        objetoreserva.dia = fecha;
        objetoreserva.hora = id;
        Swal.fire({
        title: '¿Estás seguro?',
       text: "Se realizará la reserva del libro.",
       icon: 'warning',
       showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, reservar!',
      cancelButtonText: 'Cancelar'
      }).then((result) => {
      if (result.isConfirmed) {
        numReservas++;
        $('.pop').hide();
      $.ajax({
      url: 'reserva.php',
      type: 'POST',
      data: objetoreserva, 
      success: function(data) {
      window.location.href = data['mensaje'];
      },
      error: function(error) {
      console.error('Error:', error);
      }
     });
      } else {
      Swal.fire(
      'Cancelado',
      'No se realizó ninguna reserva.',
      'error'
        );
    }
});
} else {
  Swal.fire(
  'Error',
  'Debes estar registrado o pasaste el número de reservas máxima.',
'error'
    );
         }
    });