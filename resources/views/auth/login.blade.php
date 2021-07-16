<!DOCTYPE html>
<html>

@include('layouts.main.script')

</head>
<body>
<a href="offer.html"><img src="images/download.png" class="img-head" alt=""></a>

<!-- HEADER SECTION -->
@include('layouts.main.header')

 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
		<h4><a href="{{ route('index') }}">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->

	<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<form method="POST" action="{{ route('login') }}">
                        @csrf
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" class="@error('email') is-invalid @enderror" required>
                            <div class="clearfix"></div>
						</div>
						@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" class=" @error('password') is-invalid @enderror" required>
                            <div class="clearfix"></div>
						</div>
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						<input type="submit" value="Login">
					</form>
				</div>
				<div class="forg">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
					<a href="{{ route('register') }}" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

<!-- footer -->
@include('layouts.main.footer')        

 <!-- JAVASCRIPT FILES -->
 @include('layouts.main.otherScripts')

</body>
</html>