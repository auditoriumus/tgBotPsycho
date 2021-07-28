var japText = [
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '文', '部', '科', '学', '省',
    'ペ', 'ー', 'ジ', '覧', 'か', 'ら', 'ご', '覧', '資', '料', '収', '集', '保', '存',
    '事', '業', 'か', 'で', 'に', '覧', 'を', 'く', 'あ', 'だ', '探', 'る', 'か', 'の',
    '探', '触', '供', 'ム', 'フ', 'ヌ', 'ツ', 'ス', 'ク', 'ウ', 'レ', 'メ', 'ヘ', 'ネ',
    'テ', 'セ', 'ケ', 'エ', 'ヲ', 'ホ', 'ノ', 'ト', 'オ', 'か', 'さ', 'サ', 'カ', 'ア',
    'リ', 'ミ', 'ヒ', 'ニ', 'チ', 'シ', 'キ', 'イ', 'ル', 'ユ', '庭', '家', 'に', 'う',
    'こ', 'ン', 'ワ', 'ラ', 'ヤ', 'マ', 'ハ', 'ナ', 'タ', 'と', '感', 'す', 'き', '用',
    'く', 'ど', 'ま', '行', '叩', 'に', 'う', '言', '聞', 'う', 'と', 'そ', 'う', '覚',
    'う', 'る', '言', '叱', 'る', '際', 'に', 'お', '尻', 'や', '頭', 'な', 'ど', '叩',
];
let windowHeight = document.body.clientHeight;//определяем высоту клиентской части окна браузера
let windowWidth = document.body.clientWidth;//определяем ширину клиентской части окна браузера
function addColumn(count, time, direction=true) {
    for(let k = 0; k<count; k++){
        let generatedNumberPosition = (Math.random() * 100).toFixed(0);
        if(direction) {
            $('.container').append('<div style="position: absolute; top: 0; left:' + generatedNumberPosition * 10 + 'px;" class="code code-column-' + k + '"></div>');
        } else {
            $('.container').append('<div style="position: absolute; top: 0; right:' + generatedNumberPosition * 10 + 'px;" class="code code-column-' + k + '"></div>');
        }
        let i = 0;
        setInterval(function () {
            i++;
            let generatedNumberClass = (Math.random() * 100).toFixed(0);
            $('.code-column-'+k).append('<div class="symbol symbol-'+i+'">'+ japText[generatedNumberClass] +'</div>');
            $('.symbol-' + i).css('color', '#fff');
            if(i-20 > windowHeight/10){
                $('.code-column-'+k).remove();
            }
            if (i > 1) {
                var first = i - 1;
                var second = i - 2;
                var third = i - 3;
                var fourth = i - 4;
                var fifth = i - 5;
                var sixth = i - 6;
                var seventh = i - 7;
                var eighth = i - 8;
                var nineth = i - 9;
                var tenth = i - 10;
                var eleventh = i - 11;
                var twelfth = i - 12;
                var thirteen = i - 13;
                var fourteenth = i - 14;
                var fifteenth = i - 15;
                var sixteenth = i - 16;
                var seventeenth = i - 17;
                var eighteenth = i - 18;
                var nineteenth = i - 19;
                var twentieth = i - 20;

                $('.symbol-' + first).css({
                    'opacity': '0.9',
                    'color': '#57c668',
                    'font-weight': 'bold'
                });
                $('.symbol-' + second).css({
                    'opacity': '0.9',
                    'color': '#57c668'
                });
                $('.symbol-' + third).css({
                    'opacity': '0.8',
                    'color': '#57c668'
                });
                $('.symbol-' + fourth).css({
                    'opacity': '0.8',
                    'color': '#57c668'
                });
                $('.symbol-' + fifth).css({
                    'opacity': '0.8',
                    'color': '#57c668'
                });
                $('.symbol-' + sixth).css({
                    'opacity': '0.8',
                    'color': '#57c668'
                });
                $('.symbol-' + seventh).css({
                    'opacity': '0.7',
                    'color': '#57c668'
                });
                $('.symbol-' + eighth).css({
                    'opacity': '0.7',
                    'color': '#57c668'
                });
                $('.symbol-' + nineth).css({
                    'opacity': '0.6',
                    'color': '#57c668'
                });
                $('.symbol-' + tenth).css({
                    'opacity': '0.6',
                    'color': '#57c668'
                });
                $('.symbol-' + eleventh).css({
                    'opacity': '0.6',
                    'color': '#57c668'
                });
                $('.symbol-' + twelfth).css({
                    'opacity': '0.5',
                    'color': '#57c668'
                });
                $('.symbol-' + thirteen).css({
                    'opacity': '0.5',
                    'color': '#57c668'
                });
                $('.symbol-' + fourteenth).css({
                    'opacity': '0.5',
                    'color': '#57c668'
                });
                $('.symbol-' + fifteenth).css({
                    'opacity': '0.5',
                    'color': '#57c668'
                });
                $('.symbol-' + sixteenth).css({
                    'opacity': '0.4',
                    'color': '#57c668'
                });
                $('.symbol-' + seventeenth).css({
                    'opacity': '0.3',
                    'color': '#57c668'
                });
                $('.symbol-' + eighteenth).css({
                    'opacity': '0.2',
                    'color': '#57c668'
                });
                $('.symbol-' + nineteenth).css({
                    'opacity': '0.1',
                    'color': '#57c668'
                });
                $('.symbol-' + twentieth).css({
                    'opacity': '0',
                    'color': '#57c668'
                });
            }
        }, time)
    }
}