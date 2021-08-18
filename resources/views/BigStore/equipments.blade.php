<!DOCTYPE html>
<html>
 @include('layouts.main.script')
<body>
@include('layouts.main.header')


<!-- Carousel -->
@include('layouts.main.carousel')


<!--content-->
<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Popular Equipment Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l agileinf">
				            @isset( $popular_equipment )
							@forelse( $popular_equipment as $popular)
							<div class="col-md-3 pro-1">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal11">
										<img src="{{ asset('storage/'.$popular->photo) }}" class="img-responsive"  style = "width:250px;height:200px;" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="#">{{ $popular->product_name }}</a> ({{ $popular->weight }} Kg)</h6>							
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
				<h3>Equipment Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l agileinf">
				            @isset( $equipments )
							@forelse( $equipments as $equipment)
							<div class="col-md-3 pro-1">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal11">
										<img src="{{ asset('storage/'.$equipment->photo) }}" class="img-responsive" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="#">{{ $equipment->product_name }}</a> ({{ $equipment->weight }} Kg)</h6>							
										</div>
										<div class="mid-2">
											<p ><label>&cent {{ $equipment->price }}</label><em class="item_price">&cent {{ $equipment->new_price }}</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											  </div>
											<div class="clearfix"></div>
										</div>
										  @if(auth()->guest() || auth()->user()->role->id == 2)											
										  @if(session()->has('status') && session()->get("status") == $equipment->id)
										   <a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $equipment->id]) }}">Added to Cart</a>
                                            @else
										   <a class="btn btn-danger my-cart-btn my-cart-b" href = "{{ route('user.add_to_cart', ['product_id' => $equipment->id]) }}">Add to Cart</a>
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