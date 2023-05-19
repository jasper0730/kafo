@extends('template')

@section('bodySetting', '')

@section('content')
@section('css')
  
  <link rel="stylesheet" href="assets/css/support.css">

@stop
<div class="wrapper page-support">
  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->
  <section class="banner support-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      @foreach($BannerImage as $row)
      <div class="xsBGshow" data-small="{{ $row->image_mobile}}" data-large="{{ $row->image_pc }}" style="background:url('{{ $row->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x490-->
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $row->title }}</p>
            <p class="banner-txt02">{{ $row->subtitle }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <a id="login" href="{{ ItemMaker::url('support') }}#support02" class="btn-down"></a>
  </section>
  <section id="support02" class="support02">
    <a class="support-anchor" href="javascript:;"><h2 class="move title">{{ $support->small_title }}</h2></a>
    <div class="login-inner clearfix">
      <!-- 登入畫面 -->
      <div class="support-login">
      
      @if(!(Session()->has('Member')))
        {!! Form::open( array('url' => ItemMaker::url('member/checkAccount') , 'method'=>'POST', 'id'=>'Login' )) !!}
        <div class="box-login">
          <h2>會員登入</h2>
          <input class="fontM box-login-input" name="Account" type="text" placeholder="請輸入會員帳號">
          <input class="fontM box-login-input" name="Password" type="password" placeholder="請輸入會員密碼">
          <input class="box-login-code" name="captcha" data-info="Verification" type="text" placeholder="驗證碼">
          <div class="box-code">{!! Captcha::img() !!}</div>
          <input type="button" value="登入" class="btn-gray03 loginSend">
          <input type="hidden" name="catelog" value="">
        </div>
        {!! Form::close() !!}
      @else
      <div class="login-in">
        <p>歡迎回來，現在您將能夠查看具有權限的文件。</p>
      </div> 
      @endif

      </div>

      <div class="not-member">
        <p>如果您還不是會員，請聯繫我們獲取更多的訊息。</p>
        <a class="hvr-rectangle-out" href="{{ ItemMaker::url('contact') }}">立即聯繫</a>
      </div>
    </div>
    <div class="video-document clearfix">
      <a class="support-video" href="{{ ItemMaker::url('support/video') }}" style="background:url({{ $support->video_image }}) no-repeat center center; background-size: cover;">
        <span></span>
        <div class="inner">
          <span class="no-big">{{ $video_number}}</span>
          <span class="document-type fontM">{{ $support->video_title }}</span>
          <p>{!! $support->video_brief !!}</p>
          <span class="hvr-icon-wobble-horizontal"></span>
        </div>
      </a>
      <a class="support-video" href="{{ ItemMaker::url('support/file') }}" style="background:url({{ $support->file_image }}) no-repeat center center; background-size: cover;">
        <span></span>
        <div class="inner">
          <span class="no-big">{{ $file_number }}</span>
          <span class="document-type fontM">{{ $support->file_title }}</span>
          <p>{!! $support->file_brief !!}</p>
          <span class="hvr-icon-wobble-horizontal"></span>
        </div>
      </a>
    </div>
    <div class="support-faq">
      <a href="{{ ItemMaker::url('faq') }}" class="inner">
        <h2 class="fontM">{{ $support->bottom_title }}</h2>
        <p>{!!  $support->bottom_brief   !!}</p>
        <span class="hvr-icon-wobble-horizontal"></span>
      </a>
      <!-- 20221219-新增產品檔案手冊 -->
      <!-- 非會員需跳警告 才能點選 -->
      <!-- 已登入移除 .noLogin -->
      <a href="{{ ItemMaker::url('support/manual') }}" class="inner manual">
        <h2 class="fontM">產品檔案手冊</h2>
        <p>關於產品檔案手冊，提供文件下載</p>
        <span class="hvr-icon-wobble-horizontal"></span>
      </a>
    </div>
  </section>

<!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->
</div>
<script src="assets/js/vendor/jquery.easings.min.js"></script>
<!--光箱-->
<script src="assets/js/vendor/colorbox/jquery.colorbox-min.js"></script>
<!--滾軸-->
<script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
<script src="assets/js/vendor/scrollbar/mCustomScrollbar.concat.min.js"></script>
<!--動畫-->
<script src="assets/js/vendor/waypoints.min.js"></script>
<!--banner輪播-->
<script src="assets/js/vendor/slick/slick.min.js"></script>
<!--共用js-->
<script src="assets/js/main.js"></script>
<!--本頁js-->

<script src="assets/js/support.js"></script>
<script src="assets/js/login.js"></script>

<script  type="text/javascript" >
  $('.btn-back').click(function(){
     window.history.back();
  });
  let withoutlogin = {{ Session::has('Member')?'false':'true' }};

  $('.manual').click(function(e){
    if(withoutlogin){
      e.preventDefault();
      alert('請先登入會員~');
    }
  });

  let downloadFile = {{ Session::has('manualFile')&&!Session::has('Member')?'true':'false' }};
  if(downloadFile){
    alert('請先登入會員~');
    setTimeout(() => {
      
      history.replaceState("", "", "{{ ItemMaker::url('support') }}");
    }, 70);
  }

</script>
      @stop

@stop
