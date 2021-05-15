jQuery(document).ready(function ($) {

    // Disable first option form
    $(".MLP__contact select option:first").attr("disabled", "true");

    // Slide nuestros servicios
    const swiper = new Swiper('#slide-servicios', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            // when window width is >= 480px
            480: {
              slidesPerView: 2,
              spaceBetween: 20
            }
        }
    });

    // Tabs detalle servicios
    $('.MLP__tab-servicios-button').hover(function() {
        let id = $(this).attr('id').split('-')[1];
        $('.MLP__tab-servicios-image-' + id).toggleClass('active');
    })

    
});
