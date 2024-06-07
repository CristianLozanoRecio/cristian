document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("buttonclick").addEventListener('click', function() {
        if (userName && numReservas <= 3){
        if(confirm("Se realizará la reserva del libro, ¿Estás seguro?>")){
            fetch('../menu/reserva.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: ''
    })
    .then(response => response.text())
    .then(data => {
        window.location.href = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
        }else{
            alert("No se realizó ninguna reserva");
        }
    }else{
        alert("Debes estar registrado o pasaste el número de reservas máxima")
    }
    });
var sinopsis = document.querySelector('.sinopsis');
var mostrarmas = document.getElementById('mostrarmas');
var mostrarmenos = document.getElementById('mostrarmenos');
var sinopsismovil = document.querySelector('.sinopsismovil');
var mostrarmasmovil = document.getElementById('mostrarmasmovil');
var mostrarmenosmovil = document.getElementById('mostrarmenosmovil');

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