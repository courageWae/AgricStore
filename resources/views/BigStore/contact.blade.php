
<!DOCTYPE html>
<html>
@include('layouts.main.script')
<body>
<a href="#"><img src="images/download.png" class="img-head" alt=""></a>

<!-- HEADER SECTION -->
@include('layouts.main.header')


 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Contact</h3>
		<h4><a href="{{ route('index') }}">Home</a><label>/</label>Contact</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- contact -->
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Contact</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class=" contact-w3">	
			<div class="col-md-6 contact-right">	
				<img src="images/cac.jpg" class="img-responsive" alt="">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15883.290319819107!2d-0.1963456!3d5.59321665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sgh!4v1629162684868!5m2!1sen!2sgh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="col-md-6 contact-left">
				<h4>Contact Information</h4>
				<p> We are always at your service. Contact us with the following credentials</p>
				<ul class="contact-list">
					<li> <i class="fa fa-map-marker" aria-hidden="true"></i> 12k Street, 45 Las palmas Ghana.</li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="">info@agricstore.com</a></li>
					<li> <i class="fa fa-phone" aria-hidden="true"></i>+123 2222 222</li>
				</ul>
				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<!-- <ul class="resp-tabs-list hor_1">
							<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
							<li> <i class="fa fa-map-marker" aria-hidden="true"></i> </span></li>
							<li> <i class="fa fa-phone" aria-hidden="true"></i></li>
						</ul> -->
						@if(session()->has('message'))
                            <div class="alert {{session('alert') ?? 'alert-success'}}">
                                {{ session('message') }}
                            </div>
                        @endif
						<div class="resp-tabs-container hor_1">
							<div>
								<form action="{{ route('store') }}" method="post">
								@csrf
									<input type="text" value="Name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name';}" class = "form-control @error('name') is-invalid @enderror" required>
									@error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									<input type="email" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" class = "form-control @error('email') is-invalid @enderror" required>
									@error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									<textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'message';}" class = "form-control @error('message') is-invalid @enderror"required>Message Here</textarea>
									@error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									<input type="submit" value="Submit" >
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<!--Plug-in Initialisation-->
				<script type="text/javascript">
				$(document).ready(function() {
					//Horizontal Tab
					$('#parentHorizontalTab').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true, // 100% fit in a container
						tabidentify: 'hor_1', // The tab groups identifier
						activate: function(event) { // Callback function if tab is switched
							var $tab = $(this);
							var $info = $('#nested-tabInfo');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});

					// Child Tab
					$('#ChildVerticalTab_1').easyResponsiveTabs({
						type: 'vertical',
						width: 'auto',
						fit: true,
						tabidentify: 'ver_1', // The tab groups identifier
						activetab_bg: '#fff', // background color for active tabs in this group
						inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
						active_border_color: '#c1c1c1', // border color for active tabs heads in this group
						active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
					});

					//Vertical Tab
					$('#parentVerticalTab').easyResponsiveTabs({
						type: 'vertical', //Types: default, vertical, accordion
						width: 'auto', //auto or any width like 600px
						fit: true, // 100% fit in a container
						closed: 'accordion', // Start closed if in accordion view
						tabidentify: 'hor_1', // The tab groups identifier
						activate: function(event) { // Callback function if tab is switched
							var $tab = $(this);
							var $info = $('#nested-tabInfo2');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});
				});
			</script>
				
			</div>
			
		<div class="clearfix"></div>
	</div>
	</div>
</div>
<!-- //contact -->

<!--footer-->
@include('layouts.main.footer')

<!-- JAVASCRIPT FILES -->
@include('layouts.main.otherScripts')

  
</body>
</html>