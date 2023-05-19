var winH = $(window).height();
var base = $("base").attr("href");
$('.privacy').on('click', function(){
  $.swpmodal({
    type: 'ajax',
    url: base + '/privacy',
    closeOnEsc: false,
    closeOnOverlayClick: false,
    afterLoadingOnShow: function() {
      $('.swpmodal-container_i2.custom').css({
        'vertical-align':'middle',
        'height':winH
      });
      $('.swpmodal-overlay').css({
      'background-color': 'rgb(255, 255, 255)',
      'opacity': '1'
      });
    }
  });
});
