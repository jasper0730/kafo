// 共用分類選項設定
const category = {};

category.tabController = (target) => {
  const $tabBlock = $(`${target}`);
  if (!$tabBlock || $(".news").length || $(".ESG_articles").length) return;

  const $tab = $tabBlock.find("[data-tab]");

  // 取得網址參數
  const url = new URL(location.href);
  const basePath = url.pathname;
  const tabKey = url.searchParams.get("tab");

  // 若沒有參數則顯示第一筆
  if (!tabKey || !$(`[data-tab-target=${tabKey}]`).length) {
    const defaultKey = $tab.eq(0).attr("data-tab");
    $tab.eq(0).addClass("active");
    $(`[data-tab-target=${defaultKey}]`).show();
  } 
  else {
    // 顯示預設active對應的內容
    $(`[data-tab-target=${tabKey}]`).show();
    // 對應tab的active樣式
    const tabActive = $(`[data-tab=${tabKey}]`);
    $tab.removeClass("active");
    tabActive.addClass("active");
  }

  $tab.off("click.category").on("click.category", function () {
    const self = $(this);
    const tab = self.attr("data-tab");
    // active樣式
    self.addClass("active").siblings("[data-tab]").removeClass("active");

    // category.addHashUrl(tab)
    category.addUrl(basePath, tab);

    // 顯示tab對應的內容
    $(`[data-tab-target=${tab}]`).fadeIn().siblings("[data-tab-target]").hide();
  });
};

category.addUrl = function (url, tab) {
  history.replaceState("", "", url + "?tab=" + tab);
};

category.tabActive = () => {
  const $tabBlock = $('.tab-block');

  const $tab = $tabBlock.find("[data-tab]");

  $tab.off("click.category").on("click.category", function () {
    const self = $(this);

    // 點擊的tab呈現active樣式,並移除其他tab的active
    self.addClass("active").siblings("[data-tab]").removeClass("active");
  });
};

category.tabChange = (target) => {
  // 顯示tab對應的內容,並隱藏其他內容
  $(`[data-tab-target=${target}]`)
    .fadeIn()
    .siblings("[data-tab-target]")
    .hide();
};

category.all = function () {
  const $category = $(".tab-block");
  if (!$category.length) return;

  this.tabActive();
  this.tabController('.tab-block');
};

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

  // 頁籤功能
  category.all()
})
