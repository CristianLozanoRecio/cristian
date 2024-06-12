
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