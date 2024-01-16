@extends('admin.home')
@section('title', 'Manager Add')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
           <form action="{{url('addbranch')}}" method="post">
            @csrf
            <div class="row mt-2" >
                <div class="col">
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <h2 class="text-center"> Add a new Branch</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
            <div class="col-6">
                <label for="">Branch Name</label>
                </div>
                <div class="col-6">
                <input type="text" name="bname"  class="form-control">
                </div>  
                @error('bname')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">District</label>
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
                <label for="">Upozilla</label>
                </div>
                <div class="col-6">
                <input type="text" name="upozilla"  class="form-control">
                </div>  
                @error('upozilla')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror 
            </div>

            <div class="row mt-1">
                <div class="col-6">
                <label for="">Address</label>
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
                <label for="">Contact</label>
                </div>
                <div class="col-6">
                <input type="number" name="contact" class="form-control">
                </div>   
                @error('contact')
                <p class="alert alert-danger">{{ $message }}</p> 
                @enderror  
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" class="form-control btn btn-primary" value="Add New Branch">
                </div>
            </div>
           </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection