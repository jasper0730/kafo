  $(document).ready(function() {

      //產品類別下拉黏在上
      $(window).scroll(function() {
          var productDetailSticky = $('.news-type'),
              scroll = $(window).scrollTop();
          if (scroll >= 900) {
              productDetailSticky.addClass('menuFixed headerFadeIn');
          } else {
              productDetailSticky.removeClass('menuFixed headerFadeIn');
          }
      });
      //動畫
      $('.news-type').waypoint(function() {
          $('.news-type>a, .news-select, .hr01').addClass('animated-slow fadeIn');
          $('.news-type .title').addClass('move animated-slow');
      }, {
          offset: '80%'
      });

      $('.news-all li').each(function(index, element) {
          $(element).waypoint(function() {
              $(element).removeClass('hide');
              $(element).addClass('animated fadeInUp');
          }, {
              offset: '70%'
          });
      });

      // 灰線
      $('.news-bottomLine').each(function(index, element) {
          $(element).waypoint(function() {
              $(element).addClass('animated-slow fadeIn');
              $(element).addClass('move');
          }, {
              offset: '75%'
          });
      });

      // news-d isotope
      $('.grid').isotope({
          itemSelector: '.grid-item',
          masonry: {
              columnWidth: 300,
              isFitWidth: true
          }
      });
      // news-d txt
      $('.news-d-wrap').waypoint(function() {
          $('.txt01, .txt02 , .txt03, .grid').addClass('animated-slow .delay-04s fadeInUp');
          $('.news-community').addClass('animated-slow fadeIn');
      }, {
          offset: '80%'
      });

      // colorbox
      $('.slick-plant').on('click', function() {
          $(".slick-plant").colorbox({
              maxWidth: '100%',
              maxHeight: '100%',
              scrolling: true,
          });
          $('body').attr('onmousewheel', 'return false');
          $('body').css('overflow','hidden');
 
      });
      $(document).bind('cbox_closed', function() {
          $('body').removeAttr('onmousewheel');
          $('body').css('overflow','auto');
      });
  });
