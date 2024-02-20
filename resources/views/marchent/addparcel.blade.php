@extends('home')
@section('title', 'Add Parcel')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
           <form action="{{url('addnewparcel')}}" method="post">
            @csrf
            <div class="row mt-2" >
                <div class="col">
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <h2 class="text-center"> Input Parcel Information </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                <label for="">Delevery Category</label>
                </div>
                <div class="col-6">
                <select name="category" id="" class="form-control">
                    <option value="{{ __('regular') }}">Regular</option>
                    <option value="{{ __('express') }}">Express</option>
                    <option value="{{ __('pickdrop') }}">Pick & Drop</option>
                </select>
                </div>  
                @error('category')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Delevery Type</label>
                </div>
                <div class="col-6">
                <select name="type" id="" class="form-control">
                    <option value="{{ __('home') }}">Home Delivery</option>
                    <option value="{{ __('point') }}">Point Delivery</option>  
                </select>
                </div>  
                @error('type')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Receiver Phone Number</label>
                </div>
                <div class="col-6">
                <input type="number" name="contact"  class="form-control">
                </div>  
                @error('contact')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Receiver Name</label>
                </div>
                <div class="col-6">
                <input type="text" name="name" class="form-control">
                </div>   
                @error('name')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Receiver Address</label>
                </div>
                <div class="col-6">
                <input type="text" name="address" class="form-control">
                </div>   
                @error('address')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Receiver District</label>
                </div>
                <div class="col-6">
                <input type="text" name="district" class="form-control">
                </div> 
                @error('district')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Receiver Police Station</label>
                </div>
                <div class="col-6">
                <input type="text" name="policestation" class="form-control">
                </div> 
                @error('policestation')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Parcel COD Amount</label>
                </div>
                <div class="col-6">
                <input type="number" name="cod" class="form-control">
                </div> 
                @error('cod')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Add a Note</label>
                </div>
                <div class="col-6">
                <input type="text" name="note" class="form-control">
                </div> 
                @error('note')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Parcel Weight(KG)</label>
                </div>
                <div class="col-6">
                <input type="text" name="weight" required class="form-control">
                </div> 
                @error('weight')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row mt-1">
                <div class="col-6">
                <label for="">Have a Exchange Parcel </label>
                </div>
                <div class="col-6">
                <input type="checkbox" name="exchenge">
                </div> 
                @error('exchenge')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" class="form-control btn btn-primary" value="Add Parcel">
                </div>
            </div>
           </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection