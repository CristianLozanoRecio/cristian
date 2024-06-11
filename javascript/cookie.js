function setCookie(nombre, valor, dias) {
    var fecha = new Date();
    fecha.setTime(fecha.getTime() + (dias * 24 * 60 * 60 * 1000));
    var expira = "expires=" + fecha.toUTCString();
    document.cookie = nombre + "=" + valor + ";" + expira + ";path=/";
}

function getCookie(nombre) {
    var nombreEQ = nombre + "=";
    var cookies = document.cookie.split(';');
    for(var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nombreEQ) === 0) {
            return cookie.substring(nombreEQ.length, cookie.length);
        }
    }
    return null;
}

document.getElementById("ok").addEventListener("click", function() {
    setCookie("cookieAceptada", "true", 365);
    var bannerCookies = document.querySelector(".cookie");
    bannerCookies.style.display = "none";
    document.body.classList.remove("oscuro"); 
});

document.getElementById("mal").addEventListener("click", function() {
    setCookie("cookieAceptada", "false", 365); 
    var bannerCookies = document.querySelector(".cookie");
    bannerCookies.style.display = "none";
    document.body.classList.remove("oscuro");
});


window.addEventListener('load', function() {
    var cookieAceptada = getCookie('cookieAceptada');
    if (cookieAceptada !== "true") {
        var bannerCookies = document.querySelector(".cookie");
        bannerCookies.style.display = "block"; 
        document.body.classList.add("oscuro"); 
    }
});

