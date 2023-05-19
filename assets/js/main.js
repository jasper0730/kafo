$(document).ready( function(){

  //右上角語系
  $('.lan>span').click(function(){
    $('.lan-select').slideToggle();
  });
  $('.lan-select>li>a').click(function(){
    $('.lan-select').slideUp();
  });

  //右上角搜索
  $('.btn-search').click(function(){
    $('.search-input').toggleClass('open');
  });

  //產品類別下拉黏在上
  $(window).scroll(function() {
    var productDetailSticky = $('.product-type, .product-d-menu'),
        scroll = $(window).scrollTop();
    if (scroll >= 900) {
    productDetailSticky.addClass('menuFixed headerFadeIn');
    }else {
    productDetailSticky.removeClass('menuFixed headerFadeIn');
    }
  });

  // 產品類別 select
  var _theselectbox=1;
  var _selectBtn=$(".jq-selectBtn");
  var _selectBox=$(".jq-selectBox");

  _selectBtn.on('click', function() {
    if(_theselectbox==1){
      _selectBox.fadeIn(300);
      _theselectbox=0;
    }else if(_theselectbox!=1){
      _selectBox.fadeOut(300);
      _theselectbox=1;
    }
  });

  // 設定產品類別 select顯示文字
  var _selectLi = $(".jq-selectBox li");
  _selectLi.on('click', function() {
      //抓取文字→設定顯示名稱
      var str = $(this).text();
      $(".jq-selectBtn").html(str);
  });

  // 產品類別 select初始預設
  var _strDefaul = _selectLi.first().text();
  $(".jq-selectBtn").html(_strDefaul);

  //產品類別 select區塊回收
  $(document).click(function(e){
    if(!_selectBox.is(e.target) && !_selectBtn.is(e.target) && _selectBox.has(e.target).length === 0){
      _selectBox.fadeOut(300);
      _theselectbox=1;
    }
  });

  //回到頂部
  $('.btn-top').click(function(event) {
   event.preventDefault();
   $('html,body').animate({
     scrollTop: 0
   }, 1000);
  });

  //   背景     小裝置小圖  大裝置大圖
   xsBGLoad();
   $(window).resize(xsBGLoad);

   function xsBGLoad() {
    var winWidth = $(window).width();
    if (winWidth < 801) {
     $('.xsBGshow').each(function() {
      var smallsrc = $(this).data('small');
      $(this).css('background-image', 'url("' + smallsrc + '")');
     });
    } else {
     $('.xsBGshow').each(function() {
      var largesrc = $(this).data('large');
      $(this).css('background-image', 'url("' + largesrc + '")');
     });
    }
  }

  $('.banner').addClass('animated fadeIn');
  $('.bannerIND').css('opacity','1');

  $('.banner').waypoint(function() {
    $('.xsBGshow .banner-logo').addClass('animated-slow fadeInUp');
    $('.xsBGshow .txt01').addClass('delay-05s animated-slow fadeInUp');
    $('.xsBGshow .txt02').addClass('delay-15s animated-slow fadeInUp');
    $('.btn-down').addClass('delay-20s animated-slow fadeInUp');
    }, {
    offset: '80%'
  });


  $('.footer-main .title').addClass('move animated-slow');

  //Smooth Scrolling
  $('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: (target.offset().top - 50)
				}, 500);
				return false;
			}
		}
	});

 //menu lightbox
  $('.hamburg').on('click', function(){
    $.swpmodal({
      type: 'ajax',
      url: $('base').attr('href')+'/menu',
      afterLoadingOnShow: function(){
        /*成功返回頁面後載入 js*/
         $.getScript( "assets/js/vendor/share.js" )
          .done(function( script, textStatus ) {
          })

        $('.menu-language>ul>li>a').on('click', function(){
          $(this).parent('li').addClass('menu-chose').siblings('li').removeClass('menu-chose');
        });
        $('.allMenu').parents('.swpmodal-container_i').addClass('line move');
        $('.allMenu').parents('.swpmodal-container').css('background-color','#FFF');
        $('.box-menu').waypoint(function() {
        $('.boxmenu_close').addClass('move');
        $('.menu-logo').addClass('animated-slow fadeIn');
        $('.topLine').addClass('move animated-slow');
        $('.all-menu>ul').addClass('delay-10s animated-slow fadeIn');
        $('.bottomLine').addClass('move animated-slow');
        $('.menu-language').addClass('delay-20s animated-slow fadeIn');
        $('.menu-community').addClass('delay-25s animated-slow fadeIn');
        $('.box-menu>small').addClass('delay-25s animated-slow fadeIn');
          }, {
          offset: '80%'
        });
      },
    });
  });

  detectmob();
  function detectmob() {
    if( navigator.userAgent.match(/Android/i)
    || navigator.userAgent.match(/webOS/i)
    || navigator.userAgent.match(/iPhone/i)
    || navigator.userAgent.match(/iPad/i)
    || navigator.userAgent.match(/iPod/i)
    || navigator.userAgent.match(/BlackBerry/i)
    || navigator.userAgent.match(/Windows Phone/i)
    ){
       $('body').css('width','100%');
     }
    else {
       $('body').css('width','calc(100vw - 17px)');
     }
   }



});
