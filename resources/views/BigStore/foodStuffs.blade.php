<!DOCTYPE html>
<html>
 @include('layouts.main.script')
<body>
<a href="offer.html"><img src="{{ asset('assets/images/download.png') }}" class="img-head" alt=""></a>
@include('layouts.main.header')


<!-- Carousel -->
@include('layouts.main.carousel')


<!--content-->
<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Popular  Food Stuff Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l agileinf">
				            @isset( $popular_foodStuff )
							@forelse( $popular_foodStuff as $popular)
							<div class="col-md-3 pro-1">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal11">
										<img src="{{ asset('/uploads/reports/'.$popular->photo) }}" class="img-responsive"  style = "width:250px;height:200px;" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="#">{{ $popular->product_name }}</a> ({{ $popular->weight }}kg)</h6>
										</div>
										<div class="mid-2">
											<p ><label>&cent {{ $popular->price }}</label><em class="item_price">&cent {{ $popular->new_price }}</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											  </div>
											<div class="clearfix"></div>
										</div>
										@if(auth()->guest() || auth()->user()->role->id == 2)
											@if(session()->has('status') && session()->get("status") == $popular->id)
										   <a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $popular->id]) }}">Added to Cart</a>
                                            @else
										   <a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $popular->id]) }}">Add to Cart</a>
										    @endif
										@endif
									</div>
								</div>
							</div>
							@empty
				            <h4>Not Available</h4>
				            @endforelse
				</div>

				@endisset
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

<!--content-->
		<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Food Stuff Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
			<div class=" con-w3l agileinf">
				            @isset( $food_stuffs )
							@forelse( $food_stuffs as $food_stuff)
							<div class="col-md-3 pro-1">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal11">
										<img src="{{ asset('/uploads/reports/'.$food_stuff->photo) }}" class="img-responsive" style = "width:250px;height:200px;" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="#">{{ $food_stuff->product_name }}</a> ({{ $food_stuff->weight }}kg)</h6>
										</div>
										<div class="mid-2">
											<p ><label>&cent {{ $food_stuff->price }}</label><em class="item_price">&cent {{ $food_stuff->new_price }}</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											  </div>
											<div class="clearfix"></div>
										</div>
										@if(auth()->guest() || auth()->user()->role->id == 2)
										@if(session()->has('status') && session()->get("status") == $food_stuff->id)
										   <a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $food_stuff->id]) }}">Added to Cart</a>
                                            @else
										   <a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $food_stuff->id]) }}">Add to Cart</a>
										    @endif
										@endif
									</div>
								</div>
							</div>
							@empty
				            <h4>Sorry! No product to display. Come back in a while</h4>
				            @endforelse
				</div>

				@endisset


		</div>
	</div>


<!-- footer -->
 @include('layouts.main.footer')


 <!-- JAVASCRIPT FILES -->
 @include('layouts.main.otherScripts')
</body>
</html>
