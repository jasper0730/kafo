@extends('template')

@section('bodySetting', '')
 
@section('content')

@section('css')
   <link rel="stylesheet" href="assets/css/support.css"/>
@stop

<div class="wrapper page-faq">

    <!--header-->
    @include($locale.'.headerbanner')
    <!--******-->
    <section class="banner support-banner support-faq-banner">
        <h2 class="hideText disNone">Banner</h2>
        <div class="bannerIND">
            @foreach($BannerImage as $value)
                <div class="xsBGshow" data-small="{{ $value->image_mobile }}" data-large="{{ $value->image_pc }}" style="background:url('{{ $value->image_pc }}') no-repeat  center center; background-size:cover">
                    <!--PC尺寸1440x??-->
                    <div class="indexTit">
                        <div class="inner">
                            <p class="banner-txt01">{{ $support->faq_inner_title }}</p>
                            <p class="banner-txt02">{{ $support->faq_inner_brief }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <a href="{{ ItemMaker::url('faq') }}#faq" class="btn-down"></a>
    </section>

  <section id="faq" class="document-wrap faq-wrap">
    <div class="container top-bar">
      <div class="bread-crumbs">
        <a href="{{ ItemMaker::url('support') }}">技術支援</a><span></span>
        <a href="javascript:;">常見問題</a>
      </div>
      <a href="./index.html" class="btn-back">
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
          <i class="fa fa-angle-left fa-stack-1x" aria-hidden="true"></i>
        </span>
        回到上一層
      </a>
    </div>
    <a class="support-anchor" href="#faq"><h2 class="move title">問題列表</h2></a>
    <div class="faq-inner">
      <ul>
        @foreach($faq as $value)
          <li>
            <div class="faq-title clearfix">
              <span class="fontM">{{ $value['rank'] }}</span>
              <p>{{ $value['title'] }}</p>
            </div>
            <div class="faq-answer clearfix">
              {!! $value['content2'] !!}
            </div>
          </li>
        @endforeach

      </ul>
    </div>
  </section>
  <!--footer-->
    @include($locale.'.index_footer')
    <!--*****-->
    </div>
    @section('script')
    <script src="assets/js/vendor/jquery.easings.min.js"></script>
    <!--banner輪播-->
    <script src="assets/js/vendor/slick/slick.min.js"></script>
    <!-- lightbox -->
    <script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
    <!--動畫-->
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <!--共用js-->
    <script src="assets/js/main.js"></script>
    <!--本頁js-->
    <script src="assets/js/support.js"></script>

    <script  type="text/javascript" charset="utf-8" async defer>
      $('.btn-back').click(function(){
        window.history.back();
      });
    </script>
    
 @stop

@stop
