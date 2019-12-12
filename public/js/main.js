$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".card-animation").addClass("animated slideInUp visible card-height");
    }
});