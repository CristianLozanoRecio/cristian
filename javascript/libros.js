var indiceMostrar = 0;
var mostrarCantidad = 3;

document.getElementById("mostrar").addEventListener('click', function() {
    var elementosOcultos = document.querySelectorAll('.estiloli[style="display: none;"]');

    for (var i = indiceMostrar; i < indiceMostrar + mostrarCantidad && i < elementosOcultos.length; i++) {
        elementosOcultos[i].style.display = 'list-item';
    }

    // Actualizar el índice
    indiceMostrar += mostrarCantidad;

    // Truncar las sinopsis de todos los elementos visibles (incluidos los recién mostrados)
    truncarSinopsis();

    // Ocultar el botón si no hay más elementos ocultos para mostrar
    if (indiceMostrar >= elementosOcultos.length) {
        document.getElementById("mostrar").style.display = 'none';
    }
});

function limitarPalabras(texto) {
    var palabras = texto.trim().split(" ");

    if (palabras.length > 20) {
        palabras = palabras.slice(0, 20);
        return palabras.join(' ') + '...';
    } else {
        return texto;
    }
}

function truncarSinopsis() {
    var sinopsisElements = document.querySelectorAll('.sinopsis');
    sinopsisElements.forEach(function(sinopsisElemento) {
        var sinopsisTexto = sinopsisElemento.textContent;
        var sinopsisLimitada = limitarPalabras(sinopsisTexto);
        sinopsisElemento.textContent = sinopsisLimitada;
    });
}

// Aplicar truncamiento inicial a las sinopsis
document.addEventListener('DOMContentLoaded', function() {
    truncarSinopsis();
});
