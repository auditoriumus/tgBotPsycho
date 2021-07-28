$( document ).ready(function() {
    $('.history__open-button').on('click', function () {
        $('.history__open').hide(100);
        $('.history').css('height', '100vh');
        $('.history__line').show(100);
    })
});