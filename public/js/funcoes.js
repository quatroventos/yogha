// fixo
var alturaFixoT = $('.fixo-t').height();
var alturaFixoB = $('.fixo-b').height();
$('body').css({ paddingTop : alturaFixoT + 15 + 'px' });
$('body').css({ paddingBottom : alturaFixoB + 'px' });
if (screen.width > 760) {
    $('#aba-resultado').css({ top : alturaFixoT + 'px' });
    $('body#resultado-busca #mapa').css({ top : alturaFixoT + 'px' });
}
else {
    $('body#resultado-busca').css({ paddingTop : 0 + 'px' });
}


// slick
if (screen.width > 760) {
    $('.slider').addClass('slick');
}
else {
    $('.slider').removeClass('slick');
}

$('.slick.slide-auto ul').slick({
    infinite: false,
    slidesToScroll: 3,
    arrows: false,
    dots: false
});
$('.slick.slide-full').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    dots: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.slick.slide-2col ul').slick({
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 2,
    arrows: false,
    dots: true
});

$('.slick.slide-3col ul').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    dots: true
});

$('.slick.slide-4col ul').slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 3,
    arrows: false,
    dots: true
});

// overlay
$('.switch').on('click', function(e) {
    $('body').toggleClass('overlay');
});

$('.fundo-escuro').on('click', function(e) {
    $('body').toggleClass('overlay');
    $('.aba').removeClass('show');
});

// resultado
$('.toggle-resultado').on('click', function(e) {
    $('body').toggleClass('resultado');
    window.scrollTo(0, 0);
});

$(document).ready ( function(){
    if ($('body').is('#resultado-busca')) {
        window.scrollTo(0, 300);
    }
})

//$(window).scroll(function() {
//  var scrollTop2 = $window.scrollTop();
//  if (scrollTop2 < 250) {
//    $('.fundo-escuro-mapa').css('display','none');
//  };
//});

// senha mostrar
$('.mostrar-senha').click(function(){
    if('password' == $('.senha').attr('type')){
        $('.senha').prop('type', 'text');
        $('.mostrar-senha i').removeClass('uil-eye-slash');
        $('.mostrar-senha i').addClass('uil-eye');
    }else{
        $('.senha').prop('type', 'password');
        $('.mostrar-senha i').addClass('uil-eye-slash');
        $('.mostrar-senha i').removeClass('uil-eye');
    }
});

// menu superior
var prev = 0;
var $window = $(window);
var showScroll = $('.show-b, .show-t');

$(window).scroll(function() {
    var scrollTop = $window.scrollTop();
    showScroll.toggleClass('hidden', scrollTop > prev);
    if (scrollTop < 100) {
        showScroll.addClass('hidden');
    };
    prev = scrollTop;
});
