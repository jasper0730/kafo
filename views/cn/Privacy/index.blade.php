@extends('template')

@section('bodySetting', '')
 
@section('content')

@section('css')
  <link rel="stylesheet" href="assets/css/privacy.css">
  <link rel="stylesheet" href="assets/css/privacy-rwd.css">
@stop

  <main class="wrapper page-contact privacy-wrap">
    <a class="jq-btn-close-historical privacy">
      <h2 class="move title privacy-line">
        <div class="leave-privacy swpmodal-close">X</div>
      </h2>
    </a>
    <section class="privacy-section animated fadeIn">
      <p class="title-privacy">PRIVACY POLICY</p>
      <article class="main-article mCustomScrollbar scrollbar-inner">
        <p class="inside-info fontM">
          {{ $privacy->title }}
        </p>
        
        <h2 class="inside-web fontM">
        {!! $privacy->website !!}
        </h2>
        <p class="inside-info fontM">
          {{ $privacy->content }}
      </article>
    </section>
  </main>


@section('script')
  <script src="assets/js/vendor/jquery.easings.min.js"></script>
  <!--scroll bar-->
  <script src="assets/js/vendor/jqueryscrollbar/jquery.scrollbar.min.js"></script>
  <!--動畫-->
  <script src="assets/js/vendor/waypoints.min.js"></script>
  <script>
   jQuery(document).ready(function(){
      jQuery('.scrollbar-inner').scrollbar();
      $('.leave-privacy').click(function(){
        $(".swpmodal-overlay").remove();
        $(".swpmodal-container").remove();
      });
    });
  </script>
 @stop

@stop
