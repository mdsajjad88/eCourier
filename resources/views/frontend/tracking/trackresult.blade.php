@extends('frontend.layouts.index')
@section('title', 'Tracking')
@section('content')
<div class="container mt-5" style="min-height: 400px;">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Track Your Parcel And Check Parcel Location</h2>
            <hr>
        </div>
    </div>
    <form action="{{url('trackcheck')}}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-10">
                        <input type="text" name="parcel_id" class="form-control" placeholder="Enter Your Parcel ID Here">
                        @error('parcel_id')
                        <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-2">
                        <input type="submit" name="submit" value="Track your parcel" class="btn btn-success form-control">
                    </div>
                </div>

            </div>
        </div>
    </form>
    <div class="mt-3">
    @if(Session::has('error'))
    <p class="alert alert-danger"><b>{{ Session::get('error')}}  </b> </p>
    @endif
    </div>
   
</div>
@endsection