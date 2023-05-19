$(document).ready( function(){

  //中間選單固定在上 centerMenuBar
  $(window).scroll(function() {
    var centerMenuBar = $('.menu-center'),
    scroll = $(window).scrollTop();
    if (scroll >= 300) {
    centerMenuBar.addClass('menuFixed headerFadeIn');
    }else {
    centerMenuBar.removeClass('menuFixed headerFadeIn');
    }
  });

  // 中間選單
  // 子選單出現
  $('.navbar-main').on('click', function() {
    $('.menu-box > li').removeClass('open');
    $(this).parent('li').addClass('open');
  });
  // 子選單選擇文字顏色更換
  $('.navsub li').click(function(){
    $(this).addClass('navsub-chose').siblings().removeClass('navsub-chose');
  });
  // 顯示+
  $(".jq-menu-box").children('li').has('.navsub').addClass('ico-add');
  $(".jq-menu-btn").on('click', function() {
      $(".jq-menu-box").slideToggle(300);
      $(this).toggleClass('open');
  });
  // 設定顯示文字
  var _menuBoxLi = $(".jq-menu-box li");
  _menuBoxLi.on('click', function() {
    //抓取文字→設定顯示名稱
    var menuTxt = $(this).children('a').text();
    $(".jq-menu-btn").text(menuTxt);
  });

  $(window).resize(function() {
    if ($(this).width() > 1024) {
      $(".jq-menu-box").show();
    } else {
      $(".jq-menu-box").hide();
    }
  });


  //動畫
  $('.page-investors, .investors-banner').waypoint(function() {
    $('.banner-txt01').addClass('animated-slow fadeInUp');
    $('.banner-txt02').addClass('delay-02s animated-slow fadeInUp');
    }, {
    offset: '80%'
  });

  $('.investors-wrap').waypoint(function() {
    $('.investors-wrap .container>a').addClass('animated-slow fadeIn');
    $('.investors-wrap .container>a .title').addClass('move animated');
    $('.investors-info').addClass('delay-05s animated-slow fadeIn');
    }, {
    offset: '80%'
  });

  $('.investors-main>li').addClass('hide');
	$('.investors-main>li').each(function(index, element) {
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

  // revenue-year-select
  $('.revenue-year-select>a').click(function(){
    $(this).toggleClass('open');
    $('.revenue-year-select>ul').slideToggle();
  });
  //子選單點擊
  $('.revenue-year-select>ul>li>a').click(function(){
    var revenueYearTxt = $(this).text();
    $('.revenue-year-select>a').text(revenueYearTxt);
    $(this).parents('ul').slideUp().parent('.revenue-year-select').children('.revenue-year-select>a').removeClass('open');
  });
  //區塊回收
  $(document).click(function(e){
    if(!$('.revenue-year-select>ul').is(e.target) && !$('.revenue-year-select>a').is(e.target) && $('.revenue-year-select>ul').has(e.target).length === 0){
      $('.revenue-year-select>ul').slideUp().parent('.revenue-year-select').children('.revenue-year-select>a').removeClass('open');
    }
  });

  // revenue-class-select
  $('.revenue-class-select>a').click(function(){
    $(this).toggleClass('open');
    $('.revenue-class-select>ul').slideToggle();
  });
  //子選單點擊
  $('.revenue-class-select>ul>li>a').click(function(){
    var revenueYearTxt = $(this).text();
    $('.revenue-class-select>a').text(revenueYearTxt);
    $(this).parents('ul').slideUp().parent('.revenue-class-select').children('.revenue-class-select>a').removeClass('open');
  });
  //區塊回收
  $(document).click(function(e){
    if(!$('.revenue-class-select>ul').is(e.target) && !$('.revenue-class-select>a').is(e.target) && $('.revenue-class-select>ul').has(e.target).length === 0){
      $('.revenue-class-select>ul').slideUp().parent('.revenue-class-select').children('.revenue-class-select>a').removeClass('open');
    }
  });

  //問答
  $(".faq-answer").hide();
  $(".faq-title").click(function(){
    $(".faq-answer").slideUp().parent('li').children('.faq-title').removeClass('open');
    if($("+.faq-answer",this).css("display")=="none"){
      $("+.faq-answer",this).slideDown().parent('li').children('.faq-title').addClass('open');
    }
  });




});
