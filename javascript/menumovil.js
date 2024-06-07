$(document).ready(function(){
    $('#menumovil').click(function(){
        $('#buscar2').toggle(); 
        var $menu = $('#menulateralmovil');
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
    });
});