@extends('manager.managerhome')
@section('title', 'Parcel Edit')

@section('subsection')
<div class="cotainer">
    <div class="row">
        <div class="col">
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        @if(Session::has('error'))
        <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
            <form action="{{url('parceledit')}}" method="post">
                @csrf
                <div class="row mt-5">
                    <div class="col-10">

                        <input type="text" class="form-control" name="parcel_id" placeholder="Enter Your Editing Parcel ID Here">
                    </div>
                   
                    <div class="col-2">
                        <input type="submit" value="Search" class="btn btn-success">
                    </div>
                    @error('parcel_id')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>

@endsection