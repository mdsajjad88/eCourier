@extends('frontend.layouts.index')
@section('content')

<!-- Start gallery Area -->
<section class="gallery-area" id="gallery">
				<div class="container-fluid">
					<div class="row no-padding">
						<div class="active-gallery">
							<div class="item single-gallery">
								<img src="{{url('frontend/img/g1.jpg')}}" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="{{url('frontend/img/g2.jpg')}}" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="{{url('frontend/img/g3.jpg')}}" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="{{url('frontend/img/g4.jpg')}}" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="{{url('frontend/img/g5.jpg')}}" alt="">
							</div>	
							<div class="item single-gallery">
								<img src="{{url('frontend/img/g6.jpg')}}" alt="">
							</div>																		
						</div>
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->


@endsection