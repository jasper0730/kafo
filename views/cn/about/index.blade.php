@extends('template')

@section('bodySetting', '')

@section('content')

@section('css')
  <link rel="stylesheet" href="assets/css/about.css">
@stop
<div class="wrapper page-product">

  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->

  
  <section id="about01" class="banner about-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      <div class="xsBGshow" data-small="{{ $BannerImage->image_mobile }}" data-large="{{ $BannerImage->image_pc }}" style="background:url('{{ $BannerImage->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x700-->
        <div class="indexTit">
          <div class="inner">
            <p class="about-banner-txt01">{{ $BannerImage->title }}</p>
            <p class="about-banner-txt02">{{ $BannerImage->subtitle }}</p>
            <!--play按鈕鍵-->
            @if($indexData[0]['video_link'])
            <a class="btn-movie youtube" href="{{ $indexData[0]['video_link'] }}" frameborder="0" allowfullscreen></a>
            <span class="btn-movie-txt">{{ $indexData[0]['video_title'] }}</span>
            @else
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- 中間選單 -->
  <ul class="navbar">
    <li><a href="{{ ItemMaker::url('About') }}#about02">公司简介</a></li>
    <li><a href="{{ ItemMaker::url('About') }}#about03">历史沿革</a></li>
    <li><a href="{{ ItemMaker::url('About') }}#about04">品质认证</a></li>
    <li><a href="{{ ItemMaker::url('About') }}#about05">制程规划</a></li>
     <li><a href="{{ ItemMaker::url('About') }}#about07">质量政策宣示文</a></li>
      <li><a href="{{ ItemMaker::url('About') }}#about08">经营团队</a></li>
    <li><a href="{{ ItemMaker::url('About') }}#about06">前往高锋</a></li>
  </ul>
 <!--董事長區-->
  <section id="about02" class="about-company">
    <div class="container">
      <a href="{{ ItemMaker::url('About') }}#about02"><h2 class="title">{{ $indexData[0]['small_title'] }}</h2></a>
      <div class="about-company-img">
        <img src="upload/about/people.png">
      </div>
      <div class="about-content">
        <h3><span>{{ $indexData[0]['title'] }}</span><span>{{ $indexData[0]['subtitle'] }}</span></h3>
        <p class="fontM">
        {!! $indexData[0]['brief'] !!}
        </p>
      </div>
    </div>
  </section>

 <!--中間historical-->
  <section id="about03" class="about-historical" style="background: url({{ $indexData[0]['block_1_big_img'] }}) no-repeat center center; background-size: cover">
    <div class="inner">
      <span class="fontM">{!! $indexData[0]['block_1_title'] !!}</span>
      <h2 class="about-historical-t">{{ $indexData[0]['block_1_subtitle'] }}</h2>
      <p class="fontM about-historical-txt">{{ $indexData[0]['block_1_brief'] }}</p>
      <a class="fontM hvr-icon-wobble-vertical btn-learn jq-btn-historical" href="javascript:;">阅读更多</a>
    </div>
  </section>
  <!-- historical 隱藏區塊-->
  <div class="hide-block jq-hide-historical">
    <a href="javascript:;" class="jq-btn-close-historical">
      <h2 class="move title">
        <span class="btn-x">x</span>
        <span class="btn-txt">{{ $indexData[0]['block_1_small_title'] }}</span>
      </h2>
    </a>
    <div class="hide-history">
      <ul class="clearfix all-history">
        @foreach($Historical as $row)
        <li class="history-slick">
          <small>{{ $row->year }}</small>
          <div class="dot-line"></div>
          <p class="fontM">{!! $row->brief !!}</p>
        </li>
        @endforeach

      </ul>
      <div class="banner_ar">
        <span class="banner_arL"><</span>
        <span class="history-line"></span>
        <span class="banner_arR">></span>
      </div>
    </div>
  </div>


  <!-- quality process -->
  <section class="two-combine clearfix">
    <div id="about04" class="about-quality" style="background: url( {{ $indexData[0]['block_2_big_img'] }} ) no-repeat center center; background-size: cover">
      <div class="inner">
        <h2 class="about-historical-t">{!! $indexData[0]['block_2_title'] !!}<br>{!! $indexData[0]['block_2_subtitle'] !!}</h2>
        <p class="fontM about-historical-txt">{!! $indexData[0]['block_2_brief'] !!}</p>
        <a class="fontM hvr-icon-wobble-vertical btn-learn jq-btn-quality" href="javascript:;">阅读更多</a>
      </div>
    </div>

    <!--PROCESS top-->
    <div id="about05" class="about-process" style="background: url( {{ $indexData[0]['block_3_big_img'] }} ) no-repeat center center; background-size: cover">
      <div class="inner">
        <h2 class="about-historical-t">{!! $indexData[0]['block_3_title'] !!}<br>{!! $indexData[0]['block_3_subtitle'] !!}</h2>
        <p class="fontM about-historical-txt">{!! $indexData[0]['block_3_brief'] !!}</p>
        <a class="fontM hvr-icon-wobble-vertical btn-learn jq-btn-process" href="javascript:;">阅读更多</a>
      </div>
    </div>
    <!---->
  </section>
  
  <!-- quality 隱藏區塊-->
  <div class="hide-block jq-hide-quality">
    <a href="javascript:;" class="jq-btn-close-quality">
      <h2 class="move title">
        <span class="btn-x">x</span>
        <span class="btn-txt">{{ $indexData[0]['block_2_small_title'] }}</span>
      </h2>
    </a>
    <div class="fontM hide-quality">
       @foreach($Quality as $row)
            <a href="{{ $row->image_big }}" class="slick-quality">
                <img src="{{ $row->image_small }}" alt="SGS EMC">
                <p>{{ $row->title }}<br>{{ $row->subtitle }}</p>
            </a>
        @endforeach
    </div>
  </div>

  <!-- process 隱藏區塊-->
  <div class="hide-block jq-hide-process">
    <a href="javascript:;" class="jq-btn-close-process">
      <h2 class="move title">
        <span class="btn-x">x</span>
        <span class="btn-txt">{{ $indexData[0]['block_3_small_title'] }}</span>
      </h2>
    </a>
    <div class="hide-process">
      <ul class="inner clearfix">
      <!--中間區塊左-->
        @foreach($Proccess as $row)
        <li>
          <a href="javascript:;">
            <div class="process-img">
              <img src="{{ $row->image }}" alt="Excellent Process image">
            </div>
            <div class="process-txt">
              <p>{!! $row->title !!}</p>
              <ul class="fontM">
                {!! $row->brief !!}
              </ul>
            </div>
          </a>
        </li>
        @endforeach

      </ul>
      <ul class="all-process clearfix">
        <li class="process-list">
          <i>01</i>
          <img src="/upload/about/process/icon01.png">
          <p class="fontM">客制化<br>专用生产线</p>
        </li>
        <li class="process-list">
          <i>02</i>
          <img src="/upload/about/process/icon02.png">
          <p class="fontM">了解<br>客户需求</p>
        </li>
        <li class="process-list">
          <i>03</i>
          <img src="/upload/about/process/icon03.png">
          <p class="fontM">分析<br>及规划</p>
        </li>
        <li class="process-list">
          <i>04</i>
          <img src="/upload/about/process/icon04.png">
          <p class="fontM">客户端提案</p>
        </li>
        <li class="process-list">
          <i>05</i>
          <img src="/upload/about/process/icon05.png">
          <p class="fontM">订单<br>及规格确认</p>
        </li>
        <li class="process-list">
          <i>06</i>
          <img src="/upload/about/process/icon06.png">
          <p class="fontM">生产流程</p>
        </li>
        <li class="process-list">
          <i>07</i>
          <img src="/upload/about/process/icon07.png">
          <p class="fontM">安装验收</p>
        </li>
      </ul>
      <div class="about-contact">
        <p><span>如果您想要了解更多关于我们的服务，</span><span>随时欢迎与我们联系。</span></p>
        <a class="hvr-rectangle-out btn-red" href="../contact/index.html">立即联系</a>
      </div>
    </div>
  </div>

   <!-- policy management -->
  <section class="two-combine clearfix">
    <div id="about07" class="about-quality" style="background: url( {{ $indexData[0]['block_3_big_img'] }} ) no-repeat center center; background-size: cover">
      <div class="inner">
        <h2 class="about-historical-t">{!! $indexData[0]['block_4_title'] !!}<br>{!! $indexData[0]['block_4_subtitle'] !!}</h2>
        <p class="fontM about-historical-txt">{!! $indexData[0]['block_4_brief'] !!}</p>
        <a class="fontM hvr-icon-wobble-vertical btn-learn jq-btn-policy" href="javascript:;">阅读更多</a>
      </div>
    </div>

    <div id="about08" class="about-process" style="background: url( {{ $indexData[0]['block_4_big_img'] }} ) no-repeat center center; background-size: cover">
      <div class="inner">
        <h2 class="about-historical-t">{!! $indexData[0]['block_5_title'] !!}<br>{!! $indexData[0]['block_5_subtitle'] !!}</h2>
        <p class="fontM about-historical-txt">{!! $indexData[0]['block_5_brief'] !!}</p>
        <a class="fontM hvr-icon-wobble-vertical btn-learn jq-btn-management" href="javascript:;">阅读更多</a>
      </div>
    </div>
  </section>
  <!-- policy 隱藏區塊-->
  <div class="hide-block jq-hide-policy">
    <a href="javascript:;" class="jq-btn-close-policy">
      <h2 class="move title">
        <span class="btn-x">x</span>
        <span class="btn-txt">{{ $indexData[0]['block_4_small_title'] }}</span>
      </h2>
    </a>
    <div class="fontM hide-policy">
      <div class="fontM inner">
        <p>
          {!! $Policy->brief !!}
        </p>
        <ul>
          {!!$Policy->summary !!}
        </ul>
      </div>
    </div>
  </div>

  <!-- management 隱藏區塊-->
  <div class="hide-block jq-hide-management">
    <a href="javascript:;" class="jq-btn-close-management">
      <h2 class="move title">
        <span class="btn-x">x</span>
        <span class="btn-txt">{{ $indexData[0]['block_5_small_title'] }}</span>
      </h2>
    </a>
    <div class="fontM hide-management">
      <div class="inner">
        <ul class="management-all">
          @foreach($team as $row)
            <li class="management-list">
              <div class="management-listL">
                <span>{{ $row->position }}</span>
                <span>{{ $row->name }}</span>
              </div>
              <div class="management-listR">
                <span>{{ $row->locate }}</span>
                <ul>
                 {!! $row->summary !!}
                </ul>
              </div>
            </li>
          @endforeach
          
        </ul>
      </div>
    </div>
  </div>

  <section id="about06" class="about-plant" style="background: url( {{ $indexData[0]['block_6_big_img'] }} ) no-repeat center center; background-size: cover">
    <div class="inner">
      <h2 class="about-historical-t">{!! $indexData[0]['block_6_title'] !!}</h2>
      <a class="fontM hvr-icon-wobble-vertical btn-learn jq-btn-plant" href="javascript:;">阅读更多</a>
    </div>
  </section>

  <!-- plant 隱藏區塊-->
  <div class="hide-block jq-hide-plant">
    <a href="javascript:;" class="jq-btn-close-plant">
      <h2 class="move title">
        <span class="btn-x">x</span>
        <span class="btn-txt">{{ $indexData[0]['block_6_small_title'] }}</span>
      </h2>
    </a>
    {{-- 平面圖敘述 --}}
    <div class="fontM hide-policy">
      <div class="fontM inner">
        <p>
          {!! $indexData[0]['block_6_brief'] !!}
        </p>

      </div>
    </div>

    <div class="fontM hide-plant">
      @foreach($Plant as $row)
        <a href="{{ $row->image_big }}" class="slick-plant">
          <div><img src="{{ $row->image_small }}"></div>
          <p>{{ $row->title }}</p>
        </a>
      @endforeach
    </div>
  </div>
   
  <!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->

</div>

<script src="assets/js/vendor/jquery.easings.min.js"></script>
<!--動畫-->
<script src="assets/js/vendor/waypoints.min.js"></script>
<!--banner輪播-->
<script src="assets/js/vendor/slick/slick.min.js"></script>
<!-- lightbox -->
<script src="assets/js/vendor/colorbox/jquery.colorbox-min.js"></script>
<script src="assets/js/vendor/magnific/jquery.magnific-popup.min.js"></script>
<!--共用js-->
<script src="assets/js/main.js"></script>
<!--本頁js-->
<script src="assets/js/about.js"></script>
      @stop

@stop

