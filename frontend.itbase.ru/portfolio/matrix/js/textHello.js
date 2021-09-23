$('.container').append('<div class="cursor" style="position: absolute; top:1px; left: 1px; width: 18px; height: 18px; background-color: #57c668"></div>')


function cursorVisible(){
    if($('.cursor').is(':visible')){
        $('.cursor').toggle(false);
    } else {
        $('.cursor').toggle(true);
    }
};


function inputText(){
    let frazeFirst = 'Wake up, Neo...';
    let frazeSecond = 'The Matrix has you';
    $('.container').append('<div class="string_1" style="margin: 1px;"><span></span></div>');
    function writingTheWord(word, className) {
        word = word.split('');
        let i = 0;
        setInterval(function () {
            if(i < word.length){
                if(i!=0) {
                    $('.cursor').css('left', i * 12-5 + 'px');
                }
                $('.'+className).append(word[i]);
                i++;
            }
        }, 100);
    }
    writingTheWord(frazeFirst, 'string_1');
    $('.container').append('<div class="string_2" style="margin: 1px;"><span></span></div>');
    setTimeout(function () {
        $('.cursor').css({
            'left':'0px',
            'top':'24px'
        });
        writingTheWord(frazeSecond, 'string_2');
    },3000);
}
