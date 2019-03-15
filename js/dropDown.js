$(document).ready(function(){
  $('.item-ask').hide();
  $('.link').click(function(){
    $(this).css('transform', 'rotate3d(y)').toggleClass('active').next().slideToggle('fast');
    return false;
  });
});