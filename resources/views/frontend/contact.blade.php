@extends('frontend.layouts.index')
@section('title', 'Contact Us')
@section('content')

<section class="contact-area section-gap" id="contact">
				<!--  -->

				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">We'd love to hear from you</h1>
								<h5>Hotline +0095448658 <a href="" class="btn btn-primary">Call us</a></h5>
							</div>
						</div>
					</div>										
					<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
						<div class="row">	
						<div class="col-lg-6 form-group">
							<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
						
							<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

							<input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
							<button class="primary-btn mt-20">Send Message<span class="lnr lnr-arrow-right"></span></button>
							<div class="alert-msg">								
						</div>
						</div></div>
					</form>						
					
				</div>	
			</section>
			<!-- end contact Area -->
			<div class="container">
				<div class="row">
					<div class="col">
						<form action="">
						<h3 class="text-center">Our All Branch List</h3>
						<hr>
						<br>
						<input type="text" placeholder="Search Your Branch" class="form-control" id="brnchsearch">
						</form>
					</div>

				</div>
			</div>	
<section id="allBranch">

<div class="container">
	<div class="row" id="result">

	</div>
	<div class="row">
		@foreach($branch as $mybranch)
		<div class="col-3" >
			<div class="card m-2" style="min-height: 250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="card-body">
					<h5 class="card-title">Branch Name:  {{ $mybranch->bname}}</h5>
					<h6 class="card-subtitle mb-2 text-muted">District: {{ $mybranch->district }}</h6>
					<p class="card-text">Upozilla: {{$mybranch->upozilla}}</p>
					<p class="card-text">Address: {{$mybranch->address}}</p>
					<p class="card-text">Contact: {{$mybranch->contact}}</p>
					
				</div>
			</div>
		</div>
		@endforeach
		
	</div>
</div>
</section>	


<script>
	$(document).ready(function(){
		$('#brnchsearch').on('keyup', function(e){
			e.preventDefault();
			
			var branch = $(this).val();
			
			$.ajax({
				url: 'branchget',
				type: 'GET',
				data:{branch:branch},
				success:function(result){
					console.log(result.new);
					$('#result').html(result.new);
				},
				
			});
		});
	});
</script>

@endsection