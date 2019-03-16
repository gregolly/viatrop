


var $target = $('[data-anime="scroll"]'),
    animationClass = 'animate',
    offset = $(window).height() * 3/4;

function animeScroll() {
  var documentTop = $(window).scrollTop();
  $target.each(function(){
    var itemTop = $(this).offset().top;
    if(documentTop > itemTop - offset) {
      $(this).addClass(animationClass);
    } else {
      $(this).removeClass(animationClass);
    }
  });
}

animeScroll();

$(document).scroll(function(){
  animeScroll();
});