$(document).ready(function(){
    var $menufiltros = $('#filtrosmovil');
    var $menu = $('#menulateralmovil');
    $('#menumovil').click(function(){
        $('#buscar2').toggle(); 
        if ($menu.width() === 0) {
            $menu.animate({
                width: '100%', 
                right: '0'
            }, 'slow');
        } else {
            $menu.animate({
                width: '0', 
            }, 'slow');
        }
        if ($menufiltros.width() > 0) {
            $menufiltros.animate({
                width: '0', 
            }, 'slow');
        }
    });
    $('#desplegar').click(function(){
        if ($menufiltros.width() === 0) {
            $menufiltros.animate({
                width: '100%', 
                right: '0'
            }, 'slow');
        } 
        if ($menu.width() > 0) {
            $menu.animate({
                width: '0', 
            }, 'slow');
        }
    })
    $('#cerrar').click(function(){
            $menufiltros.animate({
                width: '0', 
            }, 'slow');
    })
});