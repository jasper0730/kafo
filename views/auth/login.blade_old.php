@extends('app')

@section('title')
	Fantasy
@stop

@section('content')
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" role="form" method="POST" action="{{ url('auth/login') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3 class="form-title">Login to your account</h3>
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
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>
			<button type="submit" class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click <a href="{{ url('/password/email') }}" id="forget-password">
				here </a>
				to reset your password.
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
@endsection
