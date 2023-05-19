$(document).ready( function(){

  //slick幻燈片
  $('.product-banner>.bannerIND').slick({
    slide: '.xsBGshow',
    dots: true,
    arrows: false,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear'
  });
  $('.product-d-banner').slick({
    slide: '.product-d-slick',
    dots: true,
    arrows: false,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 3500,
    fade: true,
    cssEase: 'linear'
  });
  $('.product-d-vedio').slick({
    slide: '.vedio',
    centerMode: true,
    centerPadding: '0',
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    autoplay: false,
    infinite: true,
    autoplaySpeed: 4000,
    centerPadding: '20%',
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        centerPadding: 0
      }
    }
    ]
  });
  $('.circle-slick').slick({
    slide: '.circle-slick>li',
    dots: false,
    arrows: true,
    autoplay: true,
    infinite: true,
    autoplaySpeed: 5000,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 450,
      settings: {
        slidesToShow: 1
      }
    },
  ]
  });



  //產品底圖位置
  $('.product-all>li:odd').find('.bg-gray').addClass('even-bg-gray');

  //動畫
  $('.product-type').waypoint(function() {
    $('.product-type>a, .product-select, .hr01').addClass('animated-slow fadeIn');
    $('.product-type .title').addClass('move animated-slow');
    $('.product-type').addClass('move animated-slow');
    }, {
    offset: '80%'
  });

  $('.search-type').waypoint(function() {
    $('.search-type>a, .product-select, .hr01').addClass('animated-slow fadeIn');
    $('.search-type .title').addClass('move animated-slow');
    }, {
    offset: '80%'
  });

  $('.product-all>li').addClass('hide');
	$('.product-all>li').each(function(index, element) {
	    $(element).waypoint(function() {
	        if (index % 2 == 0) {
	            $(element).addClass('animated fadeInRight');
	            $(element).removeClass('hide');
	        } else {
	            $(element).addClass('animated fadeInLeft');
	            $(element).removeClass('hide');
	        }
	    }, {
	        offset: '80%'
	    });
	});

  $('.product-d-banner').waypoint(function() {
    $('.d-slick-txt').addClass('delay-05s animated-slow fadeInLeft');
    $('.d-slick-img').addClass('animated-slow fadeIn');
    $('.product-d-banner .slick-dots').addClass('animated-slow fadeIn');
    }, {
    offset: '80%'
  });

  $('.page-product-d').waypoint(function() {
    $('.product-d-menu').addClass('animated-slow fadeIn');
    offset: '80%'
  });

  $('.features>div').addClass('hide');
  $('.features>div').each(function(index, element) {
    $(element).waypoint(function() {
    $(element).addClass('delay-03s animated-slow fadeIn');
    $(element).removeClass('hide');
  }, {
       offset: '80%'
    });
  });

  //表格滾動條樣式
  // if( $('.product-table').size() > 0 ){
	// 	$('.product-table').mCustomScrollbar({
  //     axis:"x",
	// 		theme: 'dark-thick',
	// 		// updateOnContentResize: true,
	// 	});
	// }

  // $('.product-table section').perfectScrollbar();



  //產品詳細頁影片光箱
  if( $('.product-table').size() > 0 ){
    $(".youtube").colorbox({
      iframe: true,
      innerWidth: '80%',
      maxWidth: '800px',
      innerHeight: '50%',
      maxHeight: '500px',
    });
  }


  $('.circle-slick-item').on( 'click' , function(){
    $.swpmodal({
      type: 'ajax',
      url: $('base').attr('href') + '/Product/tech/' + $(this).data('info'),
      afterLoadingOnShow: function(){
        $('.box-img-banner').slick({
          slide: '.box-slick-img',
          dots: false,
          arrows: false,
          autoplay: true,
          infinite: true,
          autoplaySpeed: 5000,
        });
			},
    });
  });

  $('.box-btn-specification').on( 'click' , function(){

    $.swpmodal({
      type: 'ajax',
      url: $('base').attr('href') + '/Product/ItemPhoto/' + $(this).attr('data-info')  ,
      afterLoadingOnShow: function(){
        $('.box-specification-banner').slick({
          slide: '.box-specification-banner>.box-slick-img',
          dots: false,
          arrows: false,
          autoplay: true,
          infinite: true,
          autoplaySpeed: 5000,
        });
			},
    });
  });


  $('.box-btn-login').on( 'click' , function(){
    $.swpmodal({
      type: 'ajax',
      // url: 'views/load/box-detail-login.html',
      url:　$('base').attr('href')+'/member/download/login',
      afterLoading: function (data) {
        $.getScript( "assets/js/login.js" )
          .done(function( script, textStatus ) {
          })
        .fail(function( jqxhr, settings, exception ) {
          $( "div.log" ).text( "Triggered ajaxError handler." );
        });
      }
    });

  });

  /*抓類別 title*/
  $(document).ready(function(){
      var titlearray = location.href.split("/");
      var gettitle =  titlearray.pop();

      if( !isNaN(gettitle) ){
        var id = "#"+gettitle;
        $('span.product-selected').text($('.jq-selectBox li a'+id).text());
      }else{
        $('span.product-selected ').text($('.jq-selectBox li:nth-child(1) a').text())
      }


  });

});
