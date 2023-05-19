
<div class="BOX boxLogin">
  <div class="BOX_inner">
    <a class="BOX_close swpmodal-close" href="javascript:void(0)">X</a>
    <!-- 登入畫面 -->
    {!! Form::open( array('url' => ItemMaker::url(App::getLocale().'/member/checkAccount') , 'method'=>'POST', 'id'=>'Login' )) !!}
      <div class="box-login">
        <h2>会员登入</h2>
          <input class="fontM box-login-input" name="Account" type="text" placeholder="请输入会员账号">
          <input class="fontM box-login-input" name="Password" type="password" placeholder="请输入会员密码">
          <input class="box-login-code" name="captcha" data-info="Verification" type="text" placeholder="验证码">
          <div class="box-code">{!! Captcha::img() !!}</div>
          <input type="button" value="登入" class="btn-gray03 loginSend">
          <input type="hidden" name="catelog" value="">
          <p class="box-login-txt">如果您没有账号和密码，请联系我们获取更多信息。</p>
          <input type="button" value="立即联系" class="btn-gray03">
      </div>
    {!! Form::close() !!}
  </div>
</div>

