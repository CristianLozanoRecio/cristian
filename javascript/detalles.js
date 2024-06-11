
 $('.buttonclick').on('click', function() {
         if (correo && numReservas <= 3) {
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
        $.ajax({
        url: '../menu/reserva.php',
        type: 'POST',
        data: '', 
        success: function(data) {
        window.location.href = data;
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
     document.addEventListener('DOMContentLoaded', function() {
    var sinopsis = document.querySelector('.sinopsis');
    var mostrarmas = document.getElementById('mostrarmas');
    var mostrarmenos = document.getElementById('mostrarmenos');
    var sinopsismovil = document.querySelector('.sinopsismovil');
    var mostrarmasmovil = document.getElementById('mostrarmasmovil');
    var mostrarmenosmovil = document.getElementById('mostrarmenosmovil');
    var lineaspc = sinopsis.clientHeight / parseFloat(getComputedStyle(sinopsis).lineHeight);
    var lineasmovil = sinopsismovil.clientHeight / parseFloat(getComputedStyle(sinopsismovil).lineHeight);
    if (lineaspc < 14) {
      mostrarmas.style.display = 'none';
      mostrarmenos.style.display = 'none';
    } else {
      mostrarmas.style.display = 'block';
      mostrarmenos.style.display = 'none';
    }
    if (lineasmovil < 13) {
      mostrarmasmovil.style.display = 'none';
      mostrarmenosmovil.style.display = 'none';
    } else {
      mostrarmasmovil.style.display = 'block';
      mostrarmenosmovil.style.display = 'none';
    }
    
    mostrarmas.addEventListener('click', function() {
      sinopsis.classList.add('vermas');
      mostrarmas.style.display = 'none';
      mostrarmenos.style.display = 'block';
    });
    
    mostrarmenos.addEventListener('click', function() {
      sinopsis.classList.remove('vermas');
      mostrarmenos.style.display = 'none';
      mostrarmas.style.display = 'block';
    });
    
    mostrarmasmovil.addEventListener('click', function() {
      sinopsismovil.classList.add('vermasmovil');
      mostrarmasmovil.style.display = 'none';
      mostrarmenosmovil.style.display = 'block';
    });
    
    mostrarmenosmovil.addEventListener('click', function() {
      sinopsismovil.classList.remove('vermasmovil');
      mostrarmenosmovil.style.display = 'none';
      mostrarmasmovil.style.display = 'block';
    });
});