@extends('frontend.layouts.index')
@section('content')
<style>
	
.progress {
  width: 150px;
  height: 150px;
  background: none;
  position: relative;
}

.progress::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 6px solid #eee;
  position: absolute;
  top: 0;
  left: 0;
}

.progress>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: 1;
}

.progress .progress-left {
  left: 0;
}

.progress .progress-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 6px;
  border-style: solid;
  position: absolute;
  top: 0;
}

.progress .progress-left .progress-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}

.progress .progress-right {
  right: 0;
}

.progress .progress-right .progress-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
}

.progress .progress-value {
  position: absolute;
  top: 0;
  left: 0;
}

/*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

body {
  background: #ff7e5f;
  background: -webkit-linear-gradient(to right, #ff7e5f, #feb47b);
  background: linear-gradient(to right, #ff7e5f, #feb47b);
  min-height: 100vh;
}

.rounded-lg {
  border-radius: 1rem;
}

.text-gray {
  color: #aaa;
}

div.h4 {
  line-height: 1rem;
}
</style>
<script>
	$(function() {

$(".progress").each(function() {

  var value = $(this).attr('data-value');
  var left = $(this).find('.progress-left .progress-bar');
  var right = $(this).find('.progress-right .progress-bar');

  if (value > 0) {
	if (value <= 50) {
	  right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
	} else {
	  right.css('transform', 'rotate(180deg)')
	  left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
	}
  }

})

function percentageToDegrees(percentage) {

  return percentage / 100 * 360

}

});
</script>
<section class="default-banner active-blog-slider">
	<div class="item-slider relative" style="background: url( {{ url('frontend/img/myslider.jpg') }} ); background-size: cover;">
		<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
		<div class="container">
			<div class="row fullscreen justify-content-center align-items-center">
				<div class="col-md-10 col-12">
					<div class="banner-content text-center">
						<h4 class="text-white mb-20 text-uppercase">Discover the Colorful World</h4>
						<h1 class="text-uppercase text-white">Fastest Delivery</h1>
						<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br>
							or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
						<a href="#" class="text-uppercase header-btn">+85496478512</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="item-slider relative" style="background: url({{url('frontend/img/slider4.jpeg')}}); background-size: cover;">
		<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
		<div class="container">
			<div class="row fullscreen justify-content-center align-items-center">
				<div class="col-md-10 col-12">
					<div class="banner-content text-center">
						<h4 class="text-white mb-20 text-uppercase">Discover the Colorful World</h4>
						<h1 class="text-uppercase text-white">Fastest Payment</h1>
						<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br>
							or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
						<a href="#" class="text-uppercase header-btn">+85496478512</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="item-slider relative" style="background: url({{url('frontend/img/wow.jpeg')}});background-size: cover;">
		<div class="overlay" style="background: rgba(0,0,0,.3)"></div>
		<div class="container">
			<div class="row fullscreen justify-content-center align-items-center">
				<div class="col-md-10 col-12">
					<div class="banner-content text-center">
						<h4 class="text-white mb-20 text-uppercase">Discover the Colorful World</h4>
						<h1 class="text-uppercase text-white">Do everything at home</h1>
						<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br>
							or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
						<a href="#" class="text-uppercase header-btn">+85496478512</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<div class="container m-auto p-5">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<h2 class="text-center">Luggage Courier & Delivery Service</h2>
			<hr>
		</div>
		<div class="col-2"></div>
	</div>
</div>
<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<div class="card text-center m-4">
					<img src="{{url('frontend/img/document.jpeg')}}" height="250px" class="card-img-top" alt="Photo">
					<div class="card-body">
						<h5 class="card-title"> Document Service</h5>
						<p class="card-text">Under this service we are providing document delivery for both corporate and retail customers nationwide. Envelopes weighing between 01 to 200 grams are being serviced. </p>
					</div>
				</div>
			</div>
			<div class="col-4">
			<div class="card text-center m-4" >
                            <img src="{{url('frontend/img/value.jpeg')}}" class="card-img-top" height="250px"  alt="Photo">
                            <div class="card-body">
                                <h5 class="card-title"> Value Declared Service</h5>
                                <p class="card-text">Under this service, through our countrywide 160 branches and agency offices, we collect the value declared amount against “Ecommerce and Condition Parcel Products”</p>
                            </div>
                        </div>
			</div>
			<div class="col-4">
				<div class="card text-center m-4">
					<img src="{{url('frontend/img/ict.jpeg')}}" height="250px"  class="card-img-top" alt="Photo">
					<div class="card-body">
						<h5 class="card-title"> Mobile & ICT Equipment Service</h5>
						<p class="card-text">These are regular parcel services limited to the mobile and ICT importers/distributors/manufacturers and vendors. who seek the parcel delivery services.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- second row -->
		<div class="row">
			<div class="col-4">
				<div class="card text-center m-4">
					<img src="{{url('frontend/img/Luggage3.jpg')}}" height="250px" class="card-img-top" alt="Photo">
					<div class="card-body">
						<h5 class="card-title"> Send Luggage Cheap</h5>
						<p class="card-text">Under this service we are providing document delivery for both corporate and retail customers nationwide. Envelopes weighing between 01 to 200 grams are being serviced. </p>
					</div>
				</div>
			</div>
			<div class="col-4">
			<div class="card text-center m-4" >
                            <img src="{{url('frontend/img/Luggage10.jpg')}}" class="card-img-top" height="250px"  alt="Photo">
                            <div class="card-body">
                                <h5 class="card-title"> Send Baggage for a Hassle-Free Journey</h5>
                                <p class="card-text">Under this service, through our countrywide 160 branches and agency offices, we collect the value declared amount against “Ecommerce and Condition Parcel Products”</p>
                            </div>
                        </div>
			</div>
			<div class="col-4">
				<div class="card text-center m-4">
					<img src="{{url('frontend/img/Luggage11.jpg')}}" height="250px"  class="card-img-top" alt="Photo">
					<div class="card-body">
						<h5 class="card-title"> Use a Luggage Courier Service to Avoid Airlines' High Baggage Fees</h5>
						<p class="card-text">These are regular parcel services limited to the mobile and ICT importers/distributors/manufacturers and vendors. who seek the parcel delivery services.</p>
					</div>
				</div>
			</div>
		</div>
</div>

<!-- progress bar -->

<div class="container py-5">
  <div class="row">

    <!-- For demo purpose -->
    <div class="col-lg-12 mx-auto mb-5 text-white text-center">
      <h1 class="display-4">Our Delivery Process</h1>
      
    </div>
    <!-- END -->

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
        

        <!-- Progress bar 1 -->
        <div class="progress mx-auto" data-value='25'>
          <span class="progress-left">
                        <span class="progress-bar border-primary"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-primary"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold">Booking<sup class="small"></sup></div>
          </div>
        </div>
        <!-- END -->

        <!-- Demo info -->
        
      </div>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
       

        <!-- Progress bar 2 -->
        <div class="progress mx-auto" data-value='50'>
          <span class="progress-left">
                        <span class="progress-bar border-danger"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-danger"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold">Packing<sup class="small"></sup></div>
          </div>
        </div>
        <!-- END -->

       
      </div>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
        
        <!-- Progress bar 3 -->
        <div class="progress mx-auto" data-value='75'>
          <span class="progress-left">
                        <span class="progress-bar border-success"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-success"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h4 font-weight-bold">Transportation<sup class="small"></sup></div>
          </div>
        </div>
        <!-- END -->

        
      </div>
    </div>

    <div class="col-xl-3 col-lg-6 mb-4">
      <div class="bg-white rounded-lg p-5 shadow">
       

        <!-- Progress bar 4 -->
        <div class="progress mx-auto" data-value='100'>
          <span class="progress-left">
                        <span class="progress-bar border-warning"></span>
          </span>
          <span class="progress-right">
                        <span class="progress-bar border-warning"></span>
          </span>
          <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
            <div class="h2 font-weight-bold">Delivery<sup class="small"></sup></div>
          </div>
        </div>
        <!-- END -->

       
      </div>
    </div>
  </div>
</div>
		</div>
	</div>
</div>

@endsection