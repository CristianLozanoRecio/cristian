$(document).ready(function() {
    $('.autor').select2({
        placeholder: 'Selecciona un autor',
        allowClear: true
    });
});
document.addEventListener("DOMContentLoaded", function() {
document.getElementById('masGrande').addEventListener('click', function(){
    menu('menulateralA', 'menulateralB');
});
document.getElementById('maspequeño').addEventListener('click', function(){
    menu('menulateralB', 'menulateralA');
});

function menu(mostrarId, ocultarId){
    var mostrar = document.getElementById(mostrarId);
    var ocultar = document.getElementById(ocultarId);

    ocultar.style.display = "none";
    mostrar.style.display = "block";
}
document.getElementById('pulsarreserva').addEventListener('click', function(){
        mostar('submenuReserva');
    });
    document.getElementById('pulsarusuario').addEventListener('click', function(){
        mostar('submenuUsuario');
    });
    document.getElementById('pulsarconsulta').addEventListener('click', function(){
        mostar('submenuConsulta');
    });
    document.getElementById('pulsarlibro').addEventListener('click', function(){
        mostar('submenuLibro');
    });
    document.getElementById('pulsarautor').addEventListener('click', function(){
        mostar('submenuAutor');
    });
    function mostar(idSubmenu){
        var submenu = document.getElementById(idSubmenu);
        if(window.getComputedStyle(submenu).display === "none"){
            submenu.style.display = "block";
        } else {
            submenu.style.display = "none";
        }
    }
});