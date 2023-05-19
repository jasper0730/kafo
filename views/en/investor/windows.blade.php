@extends('template')


@section('bodySetting', '')
 
@section('content')

@section('css')
    <link rel="stylesheet" href="assets/css/investors.css">
@stop

<div class="wrapper page-revenue">
  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->

  <section class="banner investors-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      @foreach($BannerImage as $value)
      <div class="xsBGshow" data-small="{{ $value->image_small }}" data-large="{{ $value->image_big }}" style="background:url('{{ $value->image_big }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x570-->
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $value->title }}</p>
            <p class="banner-txt02">台灣證券交易所 : 4510</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <!-- 中間選單 -->
  <div class="menu-center">
    <a class="menu-btn jq-menu-btn" href="javascript:void(0)">財務資訊<span>每月營收</span></a>
    <ul class="menu-box jq-menu-box">
      @foreach($titleArray as $key1 => $row)
       @foreach($row as $key2 => $title)
       <li>
        <a class="navbar-main" href="javascript:void(0)">{{ $key2 }}</a>
        <ul class="navsub">
            @foreach($title as $key3 => $branch)
            <li><a href="{{ App::getLocale()."/".$titlelink[$key1][$key2][$key3] }}">{{ $branch }}</a></li>
            @endforeach
         </ul>
      </li>
       @endforeach
      @endforeach
    </ul>
  </div>
  
  <section id="revenue" class="revenue-wrap">
    <a href="#revenue">
      <h2 class="move title">
        <span class="fontM">股東聯絡窗口</span>
      </h2>
    </a>
    <div class="inner">
      <div class="revenue-info management-info">
        <span>洽詢資訊</span>
        <span>CONTACT INFORMATION</span>
      </div>
      <section class="director-info management-group contact-group">

        @foreach($windows as $value)
        <article class="director-article management-article clearfix">
          <div class="contact-speech">
            <span class="speech-man">{{ $value->position }}</span>
            <h1 class="director-name speech-name">{{ $value->name }}</h1>
          </div>
          <div class="contact-info">
            <p class="contact-phone">聯絡人電話：<span>{{ $value->phone }}</span></p>
            <p class="contact-mail">電子信箱：<span>{{ $value->email }}</span></p>
          </div>
        </article>
        @endforeach

      </section>
      <p class="investor-word contact-word">如果對於高鋒工業有更多問題需要洽詢，歡迎立即來信與我們聯繫。</p>
      <a href="javascript:void(0)" class="trade-securities hvr-rectangle-out contact-btn">RIGHT NOW</a>
      
      <!--隱藏
      <div class="revenue-info management-info">
        <span>問答集</span>
        <span>FREQUENTLY ASKED QUESTIONS</span>
      </div>
      <div class="faq-inner">
        <ul>
          @foreach($ask as $value)
          <li>
            <div class="faq-title clearfix">
              <span class="fontM">{{ $value->rank }}</span>
              <p>{{ $value->title }}</p>
            </div>
            <div class="faq-answer clearfix">
              <p class="fontM">{{ $value->answer }}</p>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
      -->
      
    </div>

  </section>
    <!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->
</div>

</div>

      @section('script')
      
      {{-- <script src="assets/js/vendor/jquery.easings.min.js"></script> --}}
      <!--動畫-->
      <script src="assets/js/vendor/waypoints.min.js"></script>
      <!--banner輪播-->
      <script src="assets/js/vendor/slick/slick.min.js"></script>
      <!--左邊選單-->
      <script src="assets/js/vendor/jquery.nav.js"></script>
      <!--共用js-->
      <script src="assets/js/main.js"></script>
      <!--本頁js-->
      <script src="assets/js/home.js"></script>
      <script src="assets/js/investors.js"></script>

      @stop

@stop
