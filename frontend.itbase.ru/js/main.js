$(document).ready(function () {
    $(window).on('scroll', function () {
        let scrollLevel = $(window).scrollTop();
        if(scrollLevel >= 2300){
            $('.skills__html_level .skills__level').css('width', '85%');
            setTimeout(function () {
                $('.skills__css_level .skills__level').css('width', '80%');
            }, 200);
            setTimeout(function () {
                $('.skills__js_level .skills__level').css('width', '70%');
            }, 300);
            setTimeout(function () {
                $('.skills__php_level .skills__level').css('width', '85%');
            }, 400);
            setTimeout(function () {
                $('.skills__photoshop_level .skills__level').css('width', '75%');
            }, 500);
        } else {
            $('.skills__html_level .skills__level').css('width', '0');
            $('.skills__css_level .skills__level').css('width', '0');
            $('.skills__js_level .skills__level').css('width', '0');
            $('.skills__php_level .skills__level').css('width', '0');
            $('.skills__photoshop_level .skills__level').css('width', '0');
        }
    });

/*    $('.contact__form input').keyup(function () {
        if($('.contact__form_name').val()!='' && $('.contact__form_email').val()!='' && $('.contact__form_phone').val()!=''){
            $('.contact__form_submit').prop('disabled', false);
        } else {
            $('.contact__form_submit').prop('disabled', true);
        }
    });*/

    $('.navigation__menu_about').on('click', function () {
        $("html, body").animate({scrollTop:$('.about').offset().top - 40+"px"});
    });
    $('.navigation__menu_services').on('click', function () {
        $("html, body").animate({scrollTop:$('.services').offset().top - 40+"px"});
    });
    $('.navigation__menu_portfolio').on('click', function () {
        $("html, body").animate({scrollTop:$('.portfolio').offset().top - 40+"px"});
    });
    $('.navigation__menu_skills').on('click', function () {
        $("html, body").animate({scrollTop:$('.skills').offset().top - 40+"px"});
    });
    $('.navigation__menu_contact').on('click', function () {
        $("html, body").animate({scrollTop:$('.contact').offset().top - 40+"px"});
    });
});