function init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 10,
            header = $("#header");
        if (distanceY > shrinkOn) {
            header.addClass("nav-up");
        } else {
            header.removeClass("nav-up");
        }
    });
}
window.onload = init();