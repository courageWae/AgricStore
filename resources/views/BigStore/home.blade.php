<!DOCTYPE html>
<html>
@include('layouts.main.script')
<body>
<a href="offer.html"><img src="{{ asset('assets/images/download.png') }}" class="img-head" alt=""></a>

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
										<img src="{{ asset('assets/images/of19.png') }}" class="img-responsive" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html">Clips</a>(1 pack)</h6>
										</div>
										<div class="mid-2">
											<p ><label>$7.00</label><em class="item_price">$6.00</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/of20.png">Add to Cart</button>
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
