@extends('app')

@section('title')
	Fantasy
@stop

@section('content')

<!-- BEGIN : LOGIN PAGE 5-2 -->

 
</script>

 


<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset">
            <img class="login-logo login-6" src="vendor/Fantasy/assets/layouts/layout2/img/logo-log.png" style="backgorund-color : #666;" />
            <div class="login-content">
                <h1>Admin Login</h1>
                <p> {{ $ProjectName }}-企業網站後端管理系統 </p>

                <form class="login-form" autocomplete="off"  role="form" method="POST" action="{{ ItemMaker::url('auth/login') }}">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<button class="close" data-close="alert"></button>
							<ul>
								@foreach ($errors->all() as $error)
									<span>{{ $error }} </span>
								@endforeach
							</ul>
						</div>
					@endif
                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control login-username" type="email" id="login-username" autocomplete="off" placeholder="Username"  name="email" value="{{ old('email') }}"/ style="margin-bottom: 45px;">
                         </div>
                        
                  </div>
                    
                    <div class="row">
                    <div class="col-xs-6">
                            <input class="form-control login-password" id="login-password" type="password" autocomplete="off" placeholder="Password" name="password"/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="rem-password">
                                <p>
                                   
                                    <input type="text" name="captcha" data-type="required"  placeholder="Captcha" value="" >
                                     <div class="code_img">
                                        <a href="javascript:;" id="changeCap">
                                               {!! Captcha::img() !!}
                                        </a>
                                     </div>
                                </p>
                            </div>
                        </div>
{{--                         <div class="col-sm-4">
                            <div class="rem-password">
                                <p>Remember Me
                                    <input type="checkbox" class="rem-checkbox" />
                                </p>
                            </div>
                        </div> --}}
                         
                    </div>
                    <div class="row">
                    
                    <div class="col-sm-6 text-right">
                            <div class="forgot-password">
                                <a href="{{ url('/password/email') }}">Forgot Password?</a>
                            </div>
                            <button class="btn blue" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="login-footer">
                <div class="row bs-reset ">
                    <div class="col-xs-4 bs-reset" style="display : none;">
                        <ul class="login-social">
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="col-xs-6  bs-reset">
                      <div class="login-copyright text-left ">
                            <p>
                            <img class="" src="vendor/Fantasy/assets/layouts/layout2/img/login_07.png" >
                            
                            </p>
                        </div>
                    </div>
                    
                    
                    <div class="col-xs-6 bs-reset">
                        <div class="login-copyright text-right">
                            <p>© WADE DIGITAL DESIGN CO., LTD. V4.0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 bs-reset">
            <div class="login-bg"> </div>
        </div>
    </div>
</div>
<!-- END : LOGIN PAGE 5-2 -->



<script>
    var cap = document.querySelector('a[id="changeCap"]');
    cap.addEventListener("click", function () {

        var d = new Date(),
            img = this.childNodes[1];

        img.src = img.src.split('?')[0] + '?t=' + d.getMilliseconds();

    });

</script>



@endsection
