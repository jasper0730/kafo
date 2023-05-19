@extends('template')

@section('bodySetting', '')

@section('content')
@section('css')
  
  <link rel="stylesheet" href="/assets/css/support.css">

@stop
<div class="wrapper page-support">
  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->
  <section class="banner support-banner support-document-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      @foreach($BannerImage as $row)
      <div class="xsBGshow" data-small="{{ $row->image_mobile}}" data-large="{{ $row->image_pc }}" style="background:url('{{ $row->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x490-->
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">產品檔案手冊</p>
            <p class="banner-txt02">產品操作及規格手冊</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <a href="{{ ItemMaker::url('support/manual') }}#document" class="btn-down"></a>
  </section>
  <section id="document" class="document-wrap">
    <div class="container top-bar">
      <div class="bread-crumbs">
        <a href="{{ ItemMaker::url('support') }}">技術支援</a><span></span>
        <!-- 連結回上頁 -->
        <a href="javascript:;">產品檔案手冊</a>
      </div>
      <a href="{{ ItemMaker::url('support') }}" class="btn-back">
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
          <i class="fa fa-angle-left fa-stack-1x" aria-hidden="true"></i>
        </span>
        回上一層
      </a>
    </div>
    <!-- 標題 -->
    <div class="manual-box product-type">
      
      <a href="javascript:;"><span class="move title"></span></a>
      
    </div>
    <div class="manual-btn-box manual {{count($supportFileCate)>0?'':'noData'}}">
      @if(count($supportFileCate)>0)
        <div class="category-box">
          <div class="category-navbar">
            <div class="category-slider">
              <div class="wrapper">
                {{-- <!-- 可新增分類 --> --}}
                @foreach ($supportFileCate as $value)
                  <div class="item {{ $value['id']==$cate_id?'active':'' }}" bk-cate="{{ $value['id'] }}">
                    <a href="javascript:;">
                      {{ $value['title'] }}
                    </a>  
                  </div>
                @endforeach
              </div>
            </div>
            <span class="fa-stack fa-lg prev-btn">
              <i class="fa fa-angle-left fa-stack-1x" aria-hidden="true"></i>
            </span>
            <span class="fa-stack fa-lg next-btn">
              <i class="fa fa-angle-right fa-stack-1x" aria-hidden="true"></i>
            </span>
          </div>
        </div>
        {{-- <!-- 點擊分類更換下方資料 --> --}}
        <div class="ajax-box">
          <?php
            echo $subcateList;
          ?>
        </div>
      @else
        {{-- <!-- 無資料畫面 --> --}}
        <div class="no-data">
          <div class="pic">
            <img src="../../../assets/img/support-noData.svg" alt="">
          </div>
          <h2>尚無相關資料</h2>
          <p>資料建置中，暫時無相關資料</p>
        </div>
      @endif
    </div>
  </section>
  
<!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->
</div>
<script src="/assets/js/vendor/jquery.easings.min.js"></script>
<!--光箱-->
<script src="/assets/js/vendor/colorbox/jquery.colorbox-min.js"></script>
<!--滾軸-->
<script src="/assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
<script src="/assets/js/vendor/scrollbar/mCustomScrollbar.concat.min.js"></script>
<!--動畫-->
<script src="/assets/js/vendor/waypoints.min.js"></script>
<!--banner輪播-->
<script src="/assets/js/vendor/slick/slick.min.js"></script>
<!--共用js-->
<script src="/assets/js/main.js"></script>
<!-- 拖拉功能 -->
<script src="/assets/js/category-slider.js"></script>
<!--本頁js-->
<script src="/assets/js/support.js"></script>

<script  type="text/javascript" >
  $('.btn-back').click(function(){
     window.history.back();
  });

  $('.box-btn-login').on( 'click' , function(){
    $.swpmodal({
      type: 'ajax',
      url:　$('base').attr('href')+'/member/download/login',
      afterLoading: function (data) {
        $.getScript( "/assets/js/login.js" )
          .done(function( script, textStatus ) {
          })
        .fail(function( jqxhr, settings, exception ) {
          $( "div.log" ).text( "Triggered ajaxError handler." );
        });
      }
    });

  });
  // 20221219 追加
  const categorySlider = new CategorySlider('.manual-btn-box .category-slider')
  $('.category-slider .item').on('click',function () {
    const scrollToAjax = $('.category-box').offset().top
    $('html,body').animate({
      scrollTop: scrollToAjax,
    }, 800)
  })
  // console.log(categorySlider)
  $('.next-btn').on('click',function () {
    categorySlider.moveNext(300)
  })
  $('.prev-btn').on('click',function () {
    categorySlider.movePrev(300)
  })
  // 20221229
  $('.category-slider .item').on('click',function () {
    const cate = $(this).attr('bk-cate');
    let data = {
        _token: $("input[name='_token']").attr('value'),
        cate_id: cate,
    }
    $.ajax({
        type: "post",
        url: $("base").attr("href") + "/support/Ajax/manual",
        data: data,
    })
    .done(function(res) {
        history.replaceState("", "", `${$("base").attr("href")}/support/manual?cate=${cate}`);
        $('.ajax-box').empty();
        $('.ajax-box').append(res.view);
        // _g.ajaxUpdate();
    });
  })
</script>
      @stop
 
@stop
