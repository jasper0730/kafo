@extends('template')

@section('bodySetting', '')
 
@section('content')

@section('css')
  <link rel="stylesheet" href="assets/js/vendor/jqueryscrollbar/jquery.scrollbar.css">
  <link rel="stylesheet" href="assets/css/contact.css">
  <link rel="stylesheet" href="assets/css/contact-rwd.css">
@stop

<div class="wrapper page-contact">
  
  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->

  <section class="banner contact-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
     @foreach($BannerImage as $row)
      <div class="xsBGshow" data-small="{{ $row->image_mobile }}" data-large="{{ $row->image_pc }}" style="background:url('{{ $row->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x490-->
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $row->title }}</p>
            <p class="banner-txt02">{{ $row->subtitle }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <a href="{{ ItemMaker::url("contact") }}#contact02" class="btn-down"></a>
  </section>
  <section id="contact02" class="contact02">
    <a class="contact-anchor" href="#contact02"><h2 class="move title">連絡我們資訊</h2></a>
    <div class="company-box">
      <div class="button-group">
        <div class="prev-button icon-circle-left">
        </div>
        <div class="next-button icon-circle-right">
        </div>
      </div>
      <div class="company-inner clearfix" dir="">
        @foreach($contact as $value)
        <div class="company-info">
          <h2>{{ $value->title }}</h2>
          <div class="info-group">
            <p class="info-address">{{ $value->address }}</p>
            <span class="info-phone">{{ $value->phone }}</span>
            <p class="info-mail">{{ $value->email }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="map-join clearfix">
      <a class="inner-map hvr-icon-bob icon-location" href="javascript:;">
        <p>觀看地圖</p>
      </a>
      <a class="inner-join hvr-icon-bob icon-plan fa-paper-plane" aria-hidden="true" href="javascript:;">
        <p>加入我們</p>
      </a>
    </div>
    <div class="contact-us">
      <h2>歡迎聯繫我們</h2>
      <p>標示 <span class="star-point-static">*</span> 為必填項目</p>
      {!! Form::open( array('url' => ItemMaker::url('contact/send') , 'method'=>'POST', 'id'=>'formsend' )) !!}
      <div class="contact-form">
        <ul class="input-group">
          <li class="name">
            <span class="red-line"></span>
            <label class="contact-label star-point">姓名</label><input type="text" placeholder="請輸入性名" class="contact-input" name="Name" ></input>
          </li>
          <li class="company-name">
            <label class="contact-label">公司名稱</label><input type="text" placeholder="請輸入公司名稱" class="contact-input" name="Company" ></input>
          </li>
          <li class="phone">
            <label class="contact-label star-point">電話</label><input type="number" placeholder="請輸入您的聯繫電話號碼" class="contact-input" name="Phone" ></input>
          </li>
          <li class="fax">
            <label class="contact-label">傳真</label><input type="Number" placeholder="請輸入您的傳真號碼" class="contact-input" name="Fax" ></input>
          </li>
          <li class="address">
            <label class="contact-label star-point">住址</label><input type="text" placeholder="請輸入您的住址" class="contact-input" name="Address" ></input>
          </li>
          <li class="email">
            <label class="contact-label star-point">信箱</label><input type="email" placeholder="請輸入聯繫信箱" class="contact-input" name="Email" ></input>
          </li>
          <li class="subject">
            <label class="contact-label star-point">問題類型</label>
            <ul class="contact-dropdown">
              <span class="for-change" data-info="Subject" >請選擇要詢問的問題類型</span>
              <input type="hidden" name="Subject" ></input>
              @foreach($othermail as $value)
               <li class="dropdown-detail" name="{{ $value->title }}"><a href="javascript:;">{{ $value->title }}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="comments">
            <label class="contact-label star-point">內容</label><textarea  cols="50" rows="5" placeholder="請輸入內容" class="for-placeholder textarea-scrollbar scrollbar-outer" name="Comments"  ></textarea>
          </li>
          <li class="code">
            <label class="contact-label star-point">驗證碼</label><input type="text" placeholder="請輸入驗證瑪" class="contact-input" name="captcha"></input>
            <div class="cap">{!! Captcha::img() !!}</div>
          </li>
        </ul>
        <div class="send-clear clearfix">
          <input type="button" value="送出" class="contact-send">
          <input type="reset" value="清除" class="contact-clear">

        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </section>

   <!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->
</div>

      @section('script')
      
  <!--共用-->
  <script src="assets/js/vendor/jquery.easings.min.js"></script>
  <!--banner輪播-->
  <script src="assets/js/vendor/slick/slick.min.js"></script>
  <!-- lightbox -->
  <script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
  <!--動畫-->
  <script src="assets/js/vendor/waypoints.min.js"></script>
  <!--scroll bar-->
  <script src="assets/js/vendor/jqueryscrollbar/jquery.scrollbar.min.js"></script>
  <!--共用js-->
  <script src="assets/js/main.js"></script>
<!--非共用-->
  <script src="assets/js/contact.js"></script>
  
  <script>
    jQuery(document).ready(function(){
      jQuery('.textarea-scrollbar').scrollbar();
    });
  </script>

      @stop

@stop



