@extends('app')

@section('content')
<!-- BEGIN FORGOT PASSWORD FORM -->
<div class="content">
	<form class="login-form" action="{{ url('/password/email') }}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3>Forget Password ?</h3>

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
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}"/>
			</div>
		</div>
		<div class="form-actions">
			<a href="{{url('/auth/login')}}">
				<button type="button" id="back-btn" class="btn">
					<i class="m-icon-swapleft"></i> Back 
				</button>
			</a>
			<button type="submit" class="btn blue pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
</div>
<!-- END FORGOT PASSWORD FORM -->
@endsection
