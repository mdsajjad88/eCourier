@extends('home')
@section('subsection')
<div class="container">
    <div class="row">      
        <div class="col">          
            <form action="{{url('noteaction')}}" method="post">
                @csrf
                <div class="col-10">
                    <input type="text" class="form-control" name="parcelid" placeholder="Enter Your Parcel ID">
                </div>
                <div class="col-2">
                    <input type="submit" value="Search" class="mt-2 btn btn-success form-coltrol">
                </div>            
            </form>         
        </div>
        
    </div>
</div>
@endsection