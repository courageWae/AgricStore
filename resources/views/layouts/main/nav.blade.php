<div class="nav-top">
				<nav class="navbar navbar-default">

					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class=" active"><a href="{{ route('index') }}" class="hyper "><span>Home</span></a></li>

							<li class="dropdown ">
								<a href="{{ route('equipments') }}" class="dropdown-toggle  hyper" ><span>Equipments</span></a>
							</li>
							<li class="dropdown">
								<a href="{{ route('fertilizers') }}" class="dropdown-toggle hyper"><span>Fertilizers</span></a>
							</li>
							<li class="dropdown">
								<a href="{{ route('foodStuffs') }}" class="dropdown-toggle hyper"><span>Food Stuffs</span></a>
							</li>
							<!-- <li><a href="codes.html" class="hyper"> <span>Codes</span></a></li> -->
							<li><a href="{{ route('contact') }}" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
				</nav>
				@php($count = App\Models\UserProduct::where("guest_id", session()->get("rand"))->count())
                
				@if(auth()->user() && auth()->user()->role_id !== 1 )
				<a type="submit" class="btn btn-default" href = "{{ route('user.orders') }}">
                    <span class="fa fa-shopping-cart"></span>&nbsp&nbsp
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $count }}
                    </span>
                </a>
				@else
				<a type="submit" class="btn btn-default" href = "{{ route('login') }}">
                    <span class="fa fa-shopping-cart"></span>&nbsp&nbsp
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $count }}
                    </span>
                </a>
				@endif
				<div class="clearfix"></div>
</div>