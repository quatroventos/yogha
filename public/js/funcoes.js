// fixo
var alturaFixoT = $('.fixo-t').height();
var alturaFixoB = $('.fixo-b').height();
$('body').css({ paddingTop : alturaFixoT + 15 + 'px' });
$('body').css({ paddingBottom : alturaFixoB + 'px' });
$('body#resultado-busca').css({ paddingTop : 0 + 'px' });

// slick
$('.slick').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
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
});

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

$window.on('scroll', function(){
  var scrollTop = $window.scrollTop();
  showScroll.toggleClass('hidden', scrollTop > prev);
  prev = scrollTop;
  if (scrollTop < 100) {
    showScroll.addClass('hidden');
  };
});
