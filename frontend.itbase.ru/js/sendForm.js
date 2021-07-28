$( "form" ).submit(function() {
    event.preventDefault();
    let name = $('.contact__form_name').val().trim();
    let email = $('.contact__form_email').val().trim();
    let phone = $('.contact__form_phone').val().trim();
    let message = $('.contact__form_message').val().trim();

    $('.alert-message').text('');
    if(name == ''){
        $('.alert-message_name').text('Введите имя');
        return false;
    } else if(email == '') {
        $('.alert-message_email').text('Введите email');
        return false;
    } else if(phone == '') {
        $('.alert-message_phone').text('Введите телефон');
        return false;
    } else if(message.length < 10) {
        $('.alert-message_message').text('Сообщение должно содержать не менее 10 символов');
        return false;
    };

    $.ajax({
        url: '../php/send.php',
        type: $(this).attr('method'),
        data: new FormData(this),
        dataType: 'html',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('.contact__form_submit').prop('disabled', true);
        },
        success: function (data) {
            if(data){
                $('#contact__send_form').trigger('reset');
                $('.alert-message_result').text('Сообщение отправлено, спасибо!');
                $('#contact__send_form').hide(100);
                $('.contact__form_submit').prop('disabled', false);
                setTimeout(function () {
                    $('.alert-message_result').text('');
                    $('#contact__send_form').show(100);
                },2000)
            } else {
                $('.alert-message_name').text('Извините, идут работы почтового сервера! Пожалуйста свяжитесь со мной по указанным выше контактам');
                $('.contact__form_submit').prop('disabled', false);
                return false;
            }
        }
    })
});