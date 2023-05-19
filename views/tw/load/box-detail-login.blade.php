
<div class="BOX boxLogin">
  <div class="BOX_inner">
    <a class="BOX_close swpmodal-close" href="javascript:void(0)">X</a>
    <!-- 登入畫面 -->
    {!! Form::open( array('url' => ItemMaker::url(App::getLocale().'/member/checkAccount') , 'method'=>'POST', 'id'=>'Login' )) !!}
      <div class="box-login">
        <h2>會員登入</h2>
          <input class="fontM box-login-input" name="Account" type="text" placeholder="請輸入會員帳號">
          <input class="fontM box-login-input" name="Password" type="password" placeholder="請輸入會員密碼">
          <input class="box-login-code" name="captcha" data-info="Verification" type="text" placeholder="驗證碼">
          <div class="box-code">{!! Captcha::img() !!}</div>
          <input type="button" value="登入" class="btn-gray03 loginSend">
          <input type="hidden" name="catelog" value="">
          <p class="box-login-txt">如果您沒有帳號和密碼，請聯繫我們獲取更多信息。</p>
          <input type="button" value="立即聯繫" class="btn-gray03">
      </div>
    {!! Form::close() !!}
  </div>
</div>

