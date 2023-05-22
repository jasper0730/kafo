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
    <a href="{{ ItemMaker::url('support/manual/'.$page_set['url_name']) }}#document" class="btn-down"></a>
  </section>
  <section id="document" class="document-wrap">
    <div class="container top-bar">
      <div class="bread-crumbs">
        <a href="{{ ItemMaker::url('support') }}">技術支援</a><span></span>
        <!-- 連結回上頁 -->
        <a href="{{ ItemMaker::url('support/manual?cate='.$page_set['belongWhichCate']['id']) }}">產品檔案手冊</a><span></span>
        <!-- 當前分類名稱 -->
        <a>{{ $page_set['belongWhichCate']['title'] }}</a>
      </div>
      <a href="{{ ItemMaker::url('support/manual?cate='.$page_set['belongWhichCate']['id']) }}" class="btn-back">
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
      <div class="manual-title">
        <!-- 大分類 -->
        <p class="manual-class">{{ $page_set['belongWhichCate']['title'] }}</p>
        <!-- 小分類 -->
        <p class="sub-class">{{ $page_set['title'] }}</p>
      </div>
    </div>
    <!-- 表格 -->
    {{-- <!-- 無資料請加上 .noData --> --}}
    <div class="document-download manual {{ count($page_set['files'])>0?'':'noData' }}">
      <!-- 頁籤 -->
      <div class="tab-block">
        <div class="tab-container">
          <!-- data-tab 與 data-tab-target 需設定對應的值 -->
          <div class="tab" data-tab="設計">設計</div>
          <div class="tab" data-tab="電控">電控</div>
          <div class="tab" data-tab="電裝">電裝</div>
          <div class="tab" data-tab="製造">製造</div>
        </div>
      </div>
      <table data-tab-target="設計">
        <thead>
          <tr>
            <th>標題</th>
            <th>下載</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($page_set['files'] as $value)
            <tr>
              <td>{{ $value['title'] }}</td>
              <td><a bk-tag="{{ $value['url_name'] }}" href="{{ ItemMaker::url('support/download/'.$value['url_name']) }}" class="icon-download" download></a></td>
            </tr>
          @endforeach
          <tr>
        </tbody>
      </table>
      {{-- <!-- 無資料畫面 --> --}}
      <div class="no-data">
        <div class="pic">
          <img src="../../../assets/img/support-noData.svg" alt="">
        </div>
        <h2>尚無相關資料</h2>
        <p>資料建置中，暫時無相關資料</p>
      </div>
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

  <?php
    if($downloadNow){
  ?>
    setTimeout(() => {

      window.location.replace($('base').attr('href') + '/support/download/' + '{{ $downloadNow }}');
    }, 1000);
  <?php
    }
  ?>
</script>
      @stop
 
@stop

