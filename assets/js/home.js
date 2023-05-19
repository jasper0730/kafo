$(document).ready( function(){

  //首頁slick幻燈片
  $('.home-banner>.bannerIND').slick({
    slide: '.xsBGshow',
    dots: true,
    arrows: false,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear'
  });

  $('.home-product-banner').slick({
    slide: '.banner-slick',
    dots: false,
    arrows: true,
    autoplay: false,
    infinite: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear'
  });

  $('.home-news-slick').slick({
    dots: false,
    arrows: true,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 5000,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 680,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });

  //左側選單 onePageNav
  $('.left-menu').onePageNav({
      currentClass: 'current',
      changeHash: false,
      scrollSpeed: 750,
      scrollThreshold: 0.5,
      filter: '',
      easing: 'swing',
  });

  //首頁左方選單區塊 滾動到下方時自動影藏
  $(window).on('scroll resize', function() {
    var $win = $(this);

    if ($win.scrollTop() > 3000) {
      $('.left-menu').fadeOut("fast");
    } else {
      $('.left-menu').fadeIn("fast");
    }
  });

  $('.home-product').waypoint(function() {
    $('.home-product>a').addClass('animated-slow fadeIn');
    $('.home-product .title').addClass('move animated-slow');
    $('.bg-blue').addClass('delay-05s animated-slow fadeIn');
    $('.home-product-banner, .btn-home-product').addClass('delay-10s animated-slow fadeInRight');
    }, {
    offset: '80%'
  });

  $('.home-news').waypoint(function() {
    $('.home-news>a').addClass('animated-slow fadeIn');
    $('.home-news .title').addClass('move animated-slow');
    $('.home-news-bg').addClass('delay-05s animated-slow fadeInLeft');
    $('.home-news-main').addClass('delay-10s animated-slow fadeInLeft');
    }, {
    offset: '80%'
  });

  $('.home-about').waypoint(function() {
    $('.home-about>a').addClass('animated-slow fadeIn');
    $('.home-about .title').addClass('move animated-slow');
    $('.home-about-main .bg').addClass('delay-05s animated-slow fadeIn');
    $('.home-about-left').addClass('delay-10s animated-slow fadeInLeft');
    $('.home-about-right').addClass('delay-10s animated-slow fadeInRight');
    $('.home-about-menu').addClass('delay-15s animated-slow fadeIn');
    }, {
    offset: '80%'
  });







});
