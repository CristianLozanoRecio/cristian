document.addEventListener('DOMContentLoaded', function() {
    var containers = document.querySelectorAll('.container');


    containers.forEach(function(container) {
        var lista = container.querySelectorAll('.lislider');
        var menos = container.querySelector('.menos');
        var mas = container.querySelector('.mas');
        var inicio = 0;
        var visible;

        function actualizar(direccion) {

            lista.forEach(item => {
                item.classList.remove('visible', 'slide-in-right', 'slide-in-left');
                item.style.display = 'none';
            });

            for (var i = inicio; i < inicio + visible && i < lista.length; i++) {
                lista[i].style.display = '';
                (function(item) {
                    setTimeout(function() {
                        item.classList.add('visible');
                        if (direccion === 'right') {
                            item.classList.add('slide-in-right');
                        } else if (direccion === 'left') {
                            item.classList.add('slide-in-left');
                        }
                        setTimeout(function() {
                            item.classList.remove('slide-in-right', 'slide-in-left');
                        }, 500);
                    }, 0);
                })(lista[i]);
            }
        }

        mas.addEventListener('click', function() {
            inicio += visible;
            if (inicio >= lista.length) {
                inicio = 0;
            }
            actualizar('right');
        });

        menos.addEventListener('click', function() {
            var inicioarray = inicio === 0;
            if (inicioarray) {
                return;
            }

            inicio -= visible;
            if (inicio < 0) {
                inicio = Math.max(0, lista.length - visible);
            }
            actualizar('left');
        });

        function ver() {
            var width = window.innerWidth;

            if (width >= 631 && width < 1035) {
                visible = 4;
            } else if (width >= 481 && width < 630) {
                visible = 3;
            } else if (width < 480) {
                visible = 2;
            }else{
                visible = 6;
            }
        }

        ver();

        window.addEventListener('resize', function() {
            ver();
            actualizar();
        });

        actualizar();
    });
});
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
          delay: 5000,
      },
  });