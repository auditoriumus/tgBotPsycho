$(document).ready(function() {
    let width = $(document).width();
    $('.nav-item').on('click', function () {
        setTimeout(function () {
            if ($('#web-design').prop('checked')) {
                $('.nav-item-web-design').addClass('nav-item-active');
                $('.services__area-web-design').css('display', 'block');
                $('.services__area-logo-design').css('display', 'none');
                $('.services__area-ui').css('display', 'none');
                $('.services__area-photography').css('display', 'none');
                $('.nav-item-logo-design').removeClass('nav-item-active');
                $('.nav-item-ui').removeClass('nav-item-active');
                $('.nav-item-photography').removeClass('nav-item-active');
            }
            if ($('#logo-design').prop('checked')) {
                $('.nav-item-logo-design').addClass('nav-item-active');
                $('.services__area-logo-design').css('display', 'block');
                $('.services__area-web-design').css('display', 'none');
                $('.services__area-ui').css('display', 'none');
                $('.services__area-photography').css('display', 'none');
                $('.nav-item-web-design').removeClass('nav-item-active');
                $('.nav-item-ui').removeClass('nav-item-active');
                $('.nav-item-photography').removeClass('nav-item-active');
            }
            if ($('#ui').prop('checked')) {
                $('.nav-item-ui').addClass('nav-item-active');
                $('.services__area-ui').css('display', 'block');
                $('.services__area-web-design').css('display', 'none');
                $('.services__area-logo-design').css('display', 'none');
                $('.services__area-photography').css('display', 'none');
                $('.nav-item-logo-design').removeClass('nav-item-active');
                $('.nav-item-web-design').removeClass('nav-item-active');
                $('.nav-item-photography').removeClass('nav-item-active');
            }
            if ($('#photography').prop('checked')) {
                $('.nav-item-photography').addClass('nav-item-active');
                $('.services__area-photography').css('display', 'block');
                $('.services__area-logo-design').css('display', 'none');
                $('.services__area-web-design').css('display', 'none');
                $('.services__area-logo-design').css('display', 'none');
                $('.services__area-ui').css('display', 'none');
                $('.nav-item-web-design').removeClass('nav-item-active');
                $('.nav-item-ui').removeClass('nav-item-active');
                $('.nav-item-logo-design').removeClass('nav-item-active');
            }
        }, 0.01)
    });


    $('nav').on('click', function () {
        if ($('.menu__block').hasClass('menu__block-closed')) {
            $('.menu__block').removeClass('menu__block-closed').addClass('menu__block-opened');
            $('nav').removeClass('nav-closed').addClass('nav-opened');
        } else {
            $('.menu__block').removeClass('menu__block-opened').addClass('menu__block-closed');
            $('nav').removeClass('nav-opened').addClass('nav-closed');
        }
    });

});
