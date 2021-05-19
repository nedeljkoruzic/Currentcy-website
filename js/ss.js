function nbPhone() {
    var navBar = document.getElementById("NB_css_response");
    if (navBar.style.display == "none") {
        navBar.style.display = "flex";
        navBar.style.flexDirection = "column"
    } else {
        navBar.style.display = "none";
    }
}
function showSlidesNew(sliderWrap, n) {
    if (typeof n == 'undefined') n = 0;

    var current = sliderWrap.data('current') || 0;
    var slides = sliderWrap.find('.mySlides');
    var dots = sliderWrap.find('.dot');
    if (n == 'nextM') { n = current + 1; }
    if (n == 'prevM') { n = current - 1; }
    if (n >= slides.length) { n = 0; }
    if (n < 0) { n = slides.length - 1; }

    sliderWrap.data('current', n);
    slides.hide();
    dots.removeClass('active');
    slides[n].style.display = "flex";
}


$(document).ready(function() {
    $('.slideShowWrap').each(function() {
        showSlidesNew($(this), 0);
    });

    $('.slideShowWrap').on('click', '.prevM, .nextM', function() {
        var direction = $(this).hasClass('prev') ? 'prevM' : 'nextM';
        var slideShowWrap = $(this).closest('.slideShowWrap');
        showSlidesNew(slideShowWrap, direction);
    });
});
