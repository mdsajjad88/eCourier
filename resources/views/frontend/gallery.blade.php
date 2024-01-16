@extends('frontend.layouts.index')
@section('title', 'Pricing')
@section('content')
<style>
	.result{
		height: 40px;
	}
</style>
<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-3">
			<div class="card">

				<div class="card-body">
					<h3 class="card-title text-center"><a href="{{url('pricing')}}">Pricing Category</a></h3>

					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="{{url('genarelcharge')}}">Genarel Parcel Charge</a></li>
						<li class="list-group-item"><a href="{{url('bookcharge')}}">Book Delivery Charge</a></li>
						<li class="list-group-item"><a href="{{url('expresscharge')}}">Express Delivery Charge </a></li>
						<li class="list-group-item"><a href="{{url('pickdrop')}}">Pick & Drop Charge</a></li>
						<li class="list-group-item"><a href="{{url('pointcharge')}}">Point Delivery Charge</a></li>
					</ul>

				</div>
			</div>
		</div>
		<div class="col-9">
			@hasSection('charge')
			@yield('charge')
			@else
			<div class="col">
				<h3 class="text-center">সব ধরনের পার্সেল এর ক্ষেত্রে নিম্নোক্ত নিয়ম প্রযোজ্য </h3>
				<hr>
				<ul>
					<h4>
						* ১% ক্যাশ অন ডেলিভারি ও রিস্ক ম্যানেজমেন্ট চার্জ প্রযোজ্য
					</h4>
					<h4>
						* পার্সেল সাইজের কারণে ডেলিভারি মাশুল পরিবর্তিত হতে পারে
					</h4>
					<h4>
						* উক্ত চার্জসমূহ ভ্যাট ও ট্যাক্স ব্যাতিত
					</h4>
					<h4>
						* অনাকাঙ্ক্ষিত কারণবশত ডেলিভারি সময়ের পরিবর্তন হতে পারে
					</h4>
					<h4>
						*আমাদের মাধ্যমে প্যাকেজিং পার্সেল আলাদা চার্জ প্রযোজ্য
					</h4>
					<h4>
						এছাড়া অতিরিক্ত যেকোনো তথ্যের জন্য আমাদের হটলাইন নাম্বারে যোগাযোগ করুন
					</h4>
				</ul>
			</div>
			@endif
		</div>
	</div>
	<div class="row mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="text-center">Calculate Your Delivery Charge</h1>
					<hr>
				</div>
			</div>
		
			<div class="row">
				<div class="col-3">
					<form action="">
					<div>
						<label for="">Select Your Location</label>
						<select name="fromloc" id="" class="form-control">
							<option value="">Choose Your Location</option>
							@php
							$branchs = DB::table('branches')->get();
							@endphp
							@foreach($branchs as $branch)
							<option value="{{$branch->id}}">{{$branch->bname }}</option>
							@endforeach
						</select>
					</div>
					</form>
				</div>
				<div class="col-3">
					<form action="">
					<div>
						<label for="">Select Customar Location</label>
						<select name="fromloc" id="" class="form-control">
							<option value="">Choose Customer Location</option>
							@php
							$branchs = DB::table('branches')->get();
							@endphp
							@foreach($branchs as $branch)
							<option value="{{$branch->id}}">{{$branch->bname }}</option>
							@endforeach
						</select>
					</div>
					</form>
				</div>
				<div class="col-3">
					<form action="" method="post">
						@csrf
					<div>
						<label for="">Parcel Weight</label>
						<input type="number" name="weight" id="weight" class="form-control">
					</div>
					
				</div>
				<div class="col-3">
					<div>
						<label for="">Delivery Charge</label><br>
						<div id="result" class="form-control result"></div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script>
	$(document).ready(function(){
		$('#weight').keyup(function(){
			var weight = $(this).val();

			$.ajax({
				url: 'chargecheck/'+weight,
				type: 'GET',
				success:function(respons){
					
					console.log(respons.kay);
					$('#result').text(respons.kay);
				}
				});
		})
	})
</script>


	@endsection