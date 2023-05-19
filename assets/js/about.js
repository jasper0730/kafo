$(document).ready( function(){

  //中間選單固定在上 centerMenuBar
  $(window).scroll(function() {
    var centerMenuBar = $('.navbar'),
    scroll = $(window).scrollTop();
    if (scroll >= 500) {
    centerMenuBar.addClass('menuFixed headerFadeIn');
    }else {
    centerMenuBar.removeClass('menuFixed headerFadeIn');
    }
  });

  // LEARN MORE
  $('.jq-btn-historical').click(function(){
    $('.jq-hide-historical').slideToggle();
    $('.jq-hide-quality, .jq-mobile-quality, .jq-hide-process, .jq-hide-plant, .jq-hide-policy, .jq-mobile-policy, .jq-hide-management').hide();
    $('.banner_arL').click();
  });
  $('.jq-btn-close-historical').click(function(){
    $('.jq-hide-historical').slideUp();
  });

  aboutQuality();
  function aboutQuality() {
      var winWidth = $(window).width();
      if (winWidth < 769) {
          $('.jq-btn-quality').click(function() {
              $('.jq-mobile-quality').slideToggle();
              $('.jq-hide-historical, .jq-hide-process, .jq-hide-quality, .jq-hide-plant, .jq-hide-policy, .jq-mobile-policy,  .jq-hide-management').hide();
              $('.jq-mobile-quality .slick-next').click();
          });
          $('.jq-btn-close-quality').click(function() {
              $('.jq-mobile-quality').slideUp();
          });
      } else {
          $('.jq-btn-quality').click(function() {
              $('.jq-hide-quality').slideToggle();
              $('.jq-hide-historical, .jq-hide-process, .jq-hide-plant, .jq-hide-policy, .jq-mobile-policy,  .jq-hide-management').hide();
              $('.hide-quality .slick-next').click();
          });
          $('.jq-btn-close-quality').click(function() {
              $('.jq-hide-quality').slideUp();
          });
      }
  }

  aboutPolicy();
  function aboutPolicy() {
      var winWidth = $(window).width();
      if (winWidth < 769) {
          $('.jq-btn-policy').click(function() {
              $('.jq-mobile-policy').slideToggle();
              $('.jq-hide-historical, .jq-hide-policy, .jq-hide-quality, .jq-mobile-quality, .jq-hide-process, .jq-hide-plant, .jq-hide-management').hide();
              $('.jq-mobile-policy .slick-next').click();
          });
          $('.jq-btn-close-policy').click(function() {
              $('.jq-mobile-policy').slideUp();
          });
      } else {
          $('.jq-btn-policy').click(function() {
              $('.jq-hide-policy').slideToggle();
              $('.jq-hide-historical, .jq-hide-quality, .jq-mobile-quality, .jq-hide-process, .jq-hide-plant, .jq-hide-management').hide();
          });
          $('.jq-btn-close-policy').click(function() {
              $('.jq-hide-policy').slideUp();
          });
      }
  }

  $('.jq-btn-plant').click(function(){
    $('.jq-hide-plant').slideToggle();
    $('.jq-hide-historical, .jq-hide-quality, .jq-mobile-quality, .jq-hide-process, .jq-hide-policy, .jq-mobile-policy, .jq-hide-management').hide();
    $('.hide-plant .slick-next').click();
  });
  $('.jq-btn-close-plant').click(function(){
    $('.jq-hide-plant').slideUp();
  });

  $('.jq-btn-process').click(function(){
    $('.jq-hide-process').slideToggle();
    $('.jq-hide-historical, .jq-hide-quality, .jq-mobile-quality, .jq-hide-plant, .jq-hide-policy, .jq-mobile-policy,  .jq-hide-management').hide();
  });
  $('.jq-btn-close-process').click(function(){
    $('.jq-hide-process').slideUp();
  });

  $('.jq-btn-management').click(function(){
    $('.jq-hide-management').slideToggle();
    $('.jq-hide-historical, .jq-hide-quality, .jq-mobile-quality, .jq-hide-process, .jq-hide-plant, .jq-hide-policy, .jq-mobile-policy').hide();
  });
  $('.jq-btn-close-management').click(function(){
    $('.jq-hide-management').slideUp();
  });



  //slick幻燈片
  $('.about-banner>.bannerIND').slick({
    slide: '.xsBGshow',
    dots: false,
    arrows: false,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear'
  });

  $('.all-history').slick({
    slide: '.history-slick',
    dots: false,
    arrows: true,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 3000,
    slidesToShow: 5,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '0',
    appendArrows: $('.banner_ar'),
    prevArrow: $('.banner_arL'),
    nextArrow: $('.banner_arR'),
    responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 641,
      settings: {
        centerMode: false,
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 420,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });

  $('.hide-quality').slick({
    slide: '.slick-quality',
    dots: false,
    arrows: true,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 3500,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 1281,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 520,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });

  $('.hide-plant').slick({
    slide: '.slick-plant',
    dots: false,
    arrows: true,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 1500,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 1201,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 900,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 580,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
      }
    }
  ]
  });

   aboutProcess();
   function aboutProcess() {
    var winWidth = $(window).width();
    if (winWidth < 1025) {
      $('.all-process').slick({
        slide: '.process-list',
        dots: true,
        arrows: false,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 500,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 641,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
      });
    } else {

    }
  }




  //動畫
  $('.banner').waypoint(function() {
    $('.about-banner-txt01').addClass('animated-slow fadeInUp');
    $('.about-banner-txt02').addClass('delay-05s animated-slow fadeInUp');
    $('.btn-movie, .navbar').addClass('delay-08s animated-slow fadeInUp');
    $('.btn-movie-txt').addClass('delay-15s animated-slow fadeInUp');
    }, {
    offset: '80%'
  });

  $('.about-company').waypoint(function() {
    $('.about-company>.container>a').addClass('animated-slow fadeIn');
    $('.about-company .title').addClass('move animated-slow');
    $('.about-company-img').addClass('delay-05s animated-slow fadeIn');
    $('.about-content').addClass('delay-08s animated-slow fadeIn');
    }, {
    offset: '80%'
  });

  $('.about-historical').waypoint(function() {
    $('.about-historical span').addClass('animated-slow fadeInUp');
    $('.about-historical-t').addClass('delay-03s animated-slow fadeInUp');
    $('.about-historical-txt').addClass('delay-05s animated-slow fadeInUp');
    $('.btn-learn').addClass('delay-10s animated-slow fadeInUp');
    }, {
    offset: '80%'
  });

  $('.hide-block').waypoint(function() {
    $('.hide-history, .hide-quality, .hide-plant, .hide-process').addClass('delay-02s animated-slow fadeIn');
    }, {
    offset: '80%'
  });

  // lightbox
  $('.slick-quality, .slick-plant').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img',
		image: {
			verticalFit: true
		}
	});
  // lightbox 影片
  $(".youtube").colorbox({
    iframe: true,
    innerWidth: '80%',
    maxWidth: '800px',
    innerHeight: '50%',
    maxHeight: '500px',
  });

});
