$(document).ready(function () {
  //動畫
  $('.support-banner').waypoint(
    function () {
      $('.banner-txt01').addClass('animated-slow fadeInUp')
      $('.banner-txt02').addClass('delay-05s animated-slow fadeInUp')
    },
    {
      offset: '80%',
    }
  )
  $('.support02').waypoint(
    function () {
      $('.login-inner').addClass('animated-slow fadeIn')
      $('.video-document').addClass('delay-10s animated-slow fadeIn')
      $('.support-faq').addClass('delay-20s animated-slow fadeIn')
    },
    {
      offset: '80%',
    }
  )

  //影片光箱
  if ($('.youtube').size() > 0) {
    $('.youtube').colorbox({
      iframe: true,
      innerWidth: '80%',
      maxWidth: '800px',
      innerHeight: '50%',
      maxHeight: '500px',
    })
  }

  //問答
  $('.faq-answer').hide()
  $('.faq-title').click(function () {
    $('.faq-answer').slideUp().parent('li').children('.faq-title').removeClass('open')
    if ($('+.faq-answer', this).css('display') == 'none') {
      $('+.faq-answer', this).slideDown().parent('li').children('.faq-title').addClass('open')
    }
  })

  //download page
  $('.download-page').click(function () {
    $(this).addClass('page-chose').siblings().removeClass('page-chose')
  })

  // //登入畫面顯示文字
  loginInTxt()
  function loginInTxt() {
    $('.login-in').css('display', 'block')
  }
})
