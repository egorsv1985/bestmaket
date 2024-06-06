$(document).ready(function() {
  $('.vacancy-item .open, .vacancy-item .close, .vacancy-item .name a').click(function() {
    var item = $(this).parents('.vacancy-item');
    item.find('.detail').slideToggle('300', function() {
      item.toggleClass('active');
    });
    return false;
  });
});