<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html class="no-js ie6 oldie" lang="zh-tw"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 oldie" lang="zh-tw"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 oldie" lang="zh-tw"> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" lang="zh-tw"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<html lang="{{$locateLang}}" class="no-js" prefix='og: http://kafo/en#'>
<head>
  <base href="{{ItemMaker::url('/')}}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">

  
    @if(!empty($Banner->meta_title))
      <meta property="og:title" content="{{ $Banner->meta_title }}" />
    @elseif(!empty($globla_seo->meta_title))
      <meta property="og:title" content="{{ $globla_seo->meta_title }}" />
    @else
      <meta property="og:title" content="高鋒工業" />
    @endif

    @if(!empty($Banner->meta_keyword))
      <meta property="og:keyword" content="{{ $Banner->meta_keyword }}" />
      <meta name="keyword" content="{{ $Banner->meta_keyword }}">
    @elseif(!empty($globla_seo->meta_keyword))
      <meta property="og:keyword" content="{{ $globla_seo->meta_keyword }}" />
      <meta name="keyword" content="{{ $globla_seo->meta_keyword }}">
    @else
      <meta property="og:keyword" content="高鋒工業" />
      <meta name="keyword" content="高鋒,高鋒工業,高鋒機械,KAFO">
    @endif

    @if(!empty($Banner->meta_description))
      <meta property="og:description" content="{{ $Banner->meta_description }}" />
      <meta name="description" content="{{ $Banner->meta_description }}">
    @elseif(!empty($globla_seo->meta_description))
      <meta property="og:description" content="{{ $globla_seo->meta_description }}" />
      <meta name="description" content="{{ $globla_seo->meta_description }}">
    @else
      <meta property="og:description" content="高鋒工業" />
      <meta name="description" content="高鋒工業股份有限公司自西元1969年創立以來，以優良的技術根基隨著臺灣機械業的腳步一路成長，能成為模具及加工產業的領導品牌及忠實的夥伴並非偶然。關鍵在於高鋒藉著專業知識深化、持續製程改善、專注於核心技術能力提升，堅持到完美為止的態度，並獲得國家認證背書，堪稱業界的標竿。">
    @endif

    @if(!empty($Banner->meta_image))
      <meta property="og:description" content="{{ $Banner->meta_image }}" />
      <meta name="description" content="{{ $Banner->meta_image }}">
      <meta itemprop="image" content="{{ $Banner->meta_image }}">
    @elseif(!empty($globla_seo->meta_image))
      <meta property="og:description" content="{{ $globla_seo->meta_image }}" />
      <meta name="description" content="{{ $globla_seo->meta_image }}">
      <meta itemprop="image" content="{{ $globla_seo->meta_image }}">
    @else
      <meta property="og:image" content="{{ $shareData->shareTitleImage }}" />
      <meta itemprop="image" content="{{ $shareData->shareTitleImage }}">
    @endif
  
    <meta property="og:url" content="{{ItemMaker::url('/')}}" />
    
  <title>KAFO</title>
  <!-- icon -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ico/apple-touch-icon-144.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/ico/favicon.ico">
  <link rel="icon" type="image/x-icon" href="assets/img/ico/favicon.ico">
  <link rel="stylesheet" href="assets/js/vendor/magnific/magnific-popup.css" data-inprogress="">
  <!--font-awesome圖片字型-->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!--banner-->
  <link rel="stylesheet" href="assets/js/vendor/slick/slick.css"/>
  <link rel="stylesheet" href="assets/js/vendor/slick/slick-theme.css"/>
  <!-- lightbox -->
  <link rel="stylesheet" href="assets/js/vendor/colorbox/colorbox.css"/>
  <link rel="stylesheet" href="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.css"/>
  <link rel="stylesheet" href="assets/js/vendor/scrollbar/mCustomScrollbar.css"/>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/js/vendor/jqueryscrollbar/jquery.scrollbar.css">
  {{--   <link rel="stylesheet" href="assets/css/blazy.css"> --}}
  @yield('css')
  <link rel="stylesheet" href="assets/css/responsible.css" media="all">
  {{--  <link rel="stylesheet" href="assets/js/vendor/magnific/magnific-popup.css" data-inprogress=""> --}}
  <script src="assets/js/vendor/jquery.1.11.3.min.js"></script>
  {{-- <script src="http://cdn.jsdelivr.net/blazy/latest/blazy.min.js"></script> --}}
  <script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
  <!--補瀏覽器前綴-->
  <script src="assets/js/vendor/prefixfree.min.js"></script>

  @if(!empty($Banner->meta_gtm))
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer',{{ $Banner->meta_gtm }});
    </script>
  @elseif(!empty($Banner->meta_gtm))
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer',{{ $globla_seo->meta_gtm }});
    </script>
  @endif

  @if(!empty($Banner->meta_ga))
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', {{ $Banner->meta_ga }} );
    </script>
   @elseif(!empty($Banner->meta_ga))
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer',{{ $globla_seo->meta_ga }});
    </script>
  @endif
  
</head>
      
<body @yield('bodySetting')>

    @yield('content')

    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    {{-- 非共用的JS區塊 --}}
    @yield('script')
    <script src="assets/js/vendor/share.js"></script>
    <script src="assets/js/search.js"></script>

    @if(!empty($Banner->meta_gtm))
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $Banner->meta_gtm }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @elseif(!empty($Banner->meta_gtm))
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $globla_seo->meta_gtm }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif

</body>


<script type="text/javascript">

    //前台系統訊息
    @if( Session::get('Message') )
    $(function() {
        alert( "{{Session::get('Message')}}" );
    });
    @endif

</script>


</html>
