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
      <div class="b-lazy" data-small="{{ $value->image_small }}" data-src="{{ $value->image_big }}" style="background:url('{{ $value->image_big }}') no-repeat center center; background-size:cover">
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $value->title }}</p>
            <p class="banner-txt02">台灣證券交易所 : 4510</p>
          </div>
        </div>
      </div>
    @endforeach
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
        <span class="fontM">利害關係人專區</span>
      </h2>
    </a>
    <div class="inner">
      <div class="revenue-info management-info">
        <span class="title-big">利害關係人之聯絡管道</span>
        <span>CONTACT PIPE</span>
      </div>
      <section class="director-info management-group contact-pipe-group">
        @foreach($stackHolder as $value)
        <article class="director-article management-article clearfix">
          <div class="contact-pipe-speech">
            <h1 class="director-name contact-name">{{ $value->title }}</h1>
          </div>
          <div class="contact-pipe-info">
            {{-- <div class="info-section clearfix">
              <p>發言人：<span>陳昶元/協理</span></p>
              <p>電話：<span>(04)25662116 # 265</span></p>
              <p>電子郵件信箱：<span>deanchen@kafo.com.tw</span></p>
            </div>
            <div class="info-section clearfix">
              <p>代理發言人：<span>陳素媛/副理</span></p>
              <p>電話：<span>(04)25662116 # 206</span></p>
              <p>電子郵件信箱：<span>fin@kafo.com.tw</span></p>
            </div> --}}
            {!! $value->content !!}
          </div>
        </article>
        @endforeach
      </section>

      <div class="communication-div">
        <div class="revenue-info management-info">
          <span class="title-big">利害關係人之溝通</span>
          <span>COMMUNICATION</span>
        </div>
        <p class="investor-word contact-pipe-word">高鋒除了透過經營報告及年報，也經常於媒體公開公司在公司治理上的相關訊息，且在公司網站，公開相關資訊。</p>
      </div>

      <div class="revenue-info management-info">
        <span class="title-big">利害關係人鑑別</span>
        <span>IDENTIFICATION</span>
      </div>

      <p class="investor-word contact-pipe-word">高鋒參酌各部門及同業的經驗，根據依賴性、責任性、影響力等特性鑑別出主要的利害關係人有：員工及協力人員、客戶、股東、供應商、媒體記者。</p>

      <table class="table-type1 shareholder-table contact-pipe-table">
        <thead>
          <tr>
            <th>利害關係人</th>
            <th class="shareholder-title">關注議題</th>
            <th>溝通方式及頻率</th>
          </tr>
        </thead>

        <tbody>
          @foreach($identify as $value)
          <tr>
            <td>{{ $value->title }}</td>
            <td class="title_1 shareholder-title contact-pipe-title" data-title="關注議題">
              {!! $value->content_1 !!}
            </td>
            <td class="title_1 contact-pipe-title" data-title="溝通方式及頻率">
              <ul class="custom-type">
                {!! $value->content_2 !!}
              </ul>
            </td>
          </tr>
          @endforeach
         {{--  <tr>
            <td>股東</td>
            <td class="title_1 shareholder-title  contact-pipe-title" data-title="關注議題">
              <ul class="custom-type">
                <li>營運財務績效</li>
              </ul>
            </td>
            <td class="title_1  contact-pipe-title" data-title="溝通方式及頻率">
              <ul class="custom-type">
                <li>股東服務專線(04)25662116。</li>
                <li>電子郵件信箱deanchen@kafo.com.tw。</li>
                <li>前月營收公告於公開資訊觀測站與公司網站（每月）。</li>
                <li>發行線上版及紙本股東會年報（每年）。</li>
              </ul>
            </td>
          </tr> --}}

        </tbody>
      </table>

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
      <script src="assets/js/vendor/blazy.js"></script>

      @stop

@stop

