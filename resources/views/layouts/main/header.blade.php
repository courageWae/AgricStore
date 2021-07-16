<div class="header">

		<div class="container">

			<div class="logo">
				<h1 ><a href="{{ route('index') }}"><b>T<br>H<br>E</b>Agric Store<span>The Best Agric Online Market</span></a></h1>
			</div>
			<hr>
			@if(auth()->guest())
			<div class="head-t">
				<ul class="card">
					<!-- <li><a href="wishlist.html" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li> -->
					<li><a href="{{ route('login') }}" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
					<li><a href="{{ route('register') }}" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					<!-- <li><a href="about.html" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li> -->
					<!-- <li><a href="shipping.html" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li> -->
				</ul>
			</div>
            @endif
			<!-- <div class="header-ri">
				<ul class="social-top">
					<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
				</ul>
			</div> -->


				
				<!-- NAV BAR -->
                @include('layouts.main.nav')
				</div>
</div>