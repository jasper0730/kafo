
<div class="BOX boxLogin">
  <div class="BOX_inner">
    <a class="BOX_close swpmodal-close" href="javascript:void(0)">X</a>
    <!-- 登入畫面 -->
    {!! Form::open( array('url' => ItemMaker::url(App::getLocale().'/member/checkAccount') , 'method'=>'POST', 'id'=>'Login' )) !!}
      <div class="box-login">
        <h2>MEMBER LOGIN</h2>
          <input class="fontM box-login-input" name="Account" type="text" placeholder="PLEASE ENTER YOUR ACCOUNT">
          <input class="fontM box-login-input" name="Password" type="password" placeholder="PLEASE ENTER A PASSWORD">
          <input class="box-login-code" name="captcha" data-info="Verification" type="text" placeholder="VERIFICATION CODE">
          <div class="box-code">{!! Captcha::img() !!}</div>
          <input type="button" value="SIGN IN" class="btn-gray03 loginSend">
          <input type="hidden" name="catelog" value="">
          <p class="box-login-txt">If you do not have an account number and password, please contact us for more information.</p>
          <input type="button" value="RIGHT NOW" class="btn-gray03">
      </div>
    {!! Form::close() !!}
  </div>
</div>

