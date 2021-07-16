<!DOCTYPE html>
<html>
 @include('layouts.main.script')
<body>
<a href="offer.html"><img src="{{ asset('assets/images/download.png') }}" class="img-head" alt=""></a>
@include('layouts.main.header')


<!-- Carousel -->
@include('layouts.main.carousel')


<!--content-->
<div class="kic-top ">
	<div class="container ">
	<div class="kic ">
			<h3>Popular Products</h3>
			
		</div>
		<div class="col-md-4 kic-top1">
			<a href="single.html">
				<img src="images/ki.jpg" class="img-responsive" alt="">
			</a>
			<h6>Dal</h6>
			<p>Nam libero tempore</p>
		</div>
		<div class="col-md-4 kic-top1">
			<a href="single.html">
				<img src="images/ki1.jpg" class="img-responsive" alt="">
			</a>
			<h6>Snacks</h6>
			<p>Nam libero tempore</p>
		</div>
		<div class="col-md-4 kic-top1">
			<a href="single.html">
				<img src="images/ki2.jpg" class="img-responsive" alt="">
			</a>
			<h6>Spice</h6>
			<p>Nam libero tempore</p>
		</div>
	</div>
</div>

<!--content-->
		<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l agileinf">
				            @isset( $fertilizers )
							@forelse( $fertilizers as $fertilizer)
							<div class="col-md-3 pro-1">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#myModal11" class="offer-img">
										<img src="images/of34.png" class="img-responsive" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html">{{ $fertilizer->product_name }}</a>(1 kg)</h6>							
										</div>
										<div class="mid-2">
											<p ><label>&cent {{ $fertilizer->price }}</label><em class="item_price">$cent {{ $fertilizer->discount }}</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="34" data-name="Seafood" data-summary="summary 34" data-price="3.50" data-quantity="1" data-image="images/of34.png">Add to Cart</button>
										</div>
									</div>
								</div>
							</div>
							@empty
							<h4>Sorry! No product to display. Come back in a while</h4>
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