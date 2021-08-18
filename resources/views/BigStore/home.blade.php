<!DOCTYPE html>
<html>
@include('layouts.main.script')
<body>
<a href="#"><img src="{{ asset('assets/images/download.png') }}" class="img-head" alt=""></a>

<!-- HEADER SECTION -->
@include('layouts.main.header')

  <!-- MAIN BANNER SECTION -->
  @include('layouts.main.banner')

    <script>window.jQuery || document.write('<script src="{{ asset('assets/js/vendor/jquery-1.11.1.min.js') }}"><\/script>')</script>
    <script src="{{ asset('assets/js/jquery.vide.min.js') }}"></script>

<div class="content-mid">
	<div class="container">

		<div class="col-md-4 m-w3ls">
			<div class="col-md1 ">
				<a href="{{ route('equipments') }}">
					<img src="{{ asset('assets/images/co1.jpg') }}" class="img-responsive img" alt="">
					<div class="big-sa">
						<h6>New Collections</h6>
						<h3>Equip<span>ment </span></h3>
						<p>There are a wide of new equipments to pick from our new collections </p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls1">
			<div class="col-md ">
				<a href="{{ route('foodStuffs') }}">
					<img src="{{ asset('assets/images/co.jpg') }}" class="img-responsive img" alt="">
					<div class="big-sale">
						<div class="big-sale1">
							<h3>Big <span> Food</span></h3>
							<p>Want Organic Foods, look no where</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls">
			<div class="col-md1 ">
				<a href="{{ route('fertilizers') }}">
					<img src="{{ asset('assets/images/co1.jpg') }}" class="img-responsive img" alt="">
					<div class="big-sa">
						<h6>New Collections</h6>
						<h3>Fertil<span>izer</span></h3>
						<p>There are wide range of Authentic Fetilizers for you to pick form our Fertilizer Collections</p>
					</div>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--content-->


  <!-- Carousel -->
  @include('layouts.main.carousel')

<!--content-->
	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Special Offers</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				@isset( $special_offers)
				@forelse( $special_offers as $special_offer)
							<div class="col-md-3 pro-1">
								<div class="col-m">
								<a href="#" data-toggle="modal" data-target="#myModal21" class="offer-img">
										<img src="{{ asset('storage/'.$special_offer->photo) }}" class="img-responsive"  style = "width:250px;height:200px;" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="#">{{ $special_offer->product_name }}</a> ({{ $special_offer->weight }}Kg)</h6>
										</div>
										<div class="mid-2">
											<p ><label>&cent {{ $special_offer->price }}</label><em class="item_price">&cent {{ $special_offer->new_price }}</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add">
										@if(auth()->guest() || auth()->user()->role->id == 2)												
											@if(session()->has('status'))
											<a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $special_offer->id]) }}">{{ session('status') }}</a>
											@else
											<a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $special_offer->id]) }}">{{ session('status') }}</a>
                                            @endif
									    @endif
										  
										</div>
									</div>
								</div>
							</div>
				@empty
				<h4>Sorry no special offers available</h4>
				@endforelse
				@endisset			
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
