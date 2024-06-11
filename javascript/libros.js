document.addEventListener('DOMContentLoaded', function() {
    truncarSinopsis();
    var elementosOcultos = document.querySelectorAll('.estiloli[style="display: none;"]');
    if (elementosOcultos.length <= 0) {
        document.getElementById("mostrar").style.display = 'none';
    }
    else{
        document.getElementById("mostrar").style.display = 'block';
    }


        var cambiarA = document.querySelector("#menupc");
        var soloA = cambiarA.querySelectorAll("a");
        var cambiarB = document.querySelector("#filtrosmovil");
        var soloB = cambiarB.querySelectorAll("a");
        
        for (var i = 0; i < soloA.length; ++i) {
            if (arraydecodificar.includes(soloA[i].id)) {
                soloA[i].style.color = "red";
            }
        }
        for (var i = 0; i < soloB.length; ++i) {
            if (arraydecodificar.includes(soloB[i].id)) {
                soloB[i].style.color = "red";
            }
        }
        var cambio = document.getElementById("cambio");
        if (cambio) {
            cambio.innerHTML = linkcambio;
        }
    
        var cambio2 = document.getElementById("cambio2");
        if (cambio2) {
            cambio2.innerHTML = link2cambio;
        }

    });


var indiceMostrar = 0;
var mostrarCantidad = 3;
document.getElementById("mostrar").addEventListener('click', function() {
    var elementosOcultos = document.querySelectorAll('.estiloli[style="display: none;"]');

    for (var i = indiceMostrar; i < indiceMostrar + mostrarCantidad && i < elementosOcultos.length; i++) {
        elementosOcultos[i].style.display = 'list-item';
    }
    truncarSinopsis();
    elementosOcultos = document.querySelectorAll('.estiloli[style="display: none;"]');
    if (elementosOcultos.length <= 0) {
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




