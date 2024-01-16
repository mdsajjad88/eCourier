@extends('home')
@section('title', 'Profile Edit')

@section('subsection')
<div class="conteiner">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Marchent Editing Information</h2><hr>
        </div>
    </div>
    @if(Session::has('success'))
    <p class="alert alert-success">{{Session::get('success')}}</p>
    @endif
    <div class="row">
        <div class="col-8 m-auto">
            <form action="{{url('editproaction')}}" method="post">
                @csrf
                <div>
                    <label for="">Primary Numbar</label>
                    <input type="text" name="primary_num" value="{{$marchents->primary_num}}" class="form-control">
                    @error('primary_num')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Local Address</label>
                    <input type="text" name="local_address" value="{{$marchents->local_address}}" class="form-control">
                    @error('local_address')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Upozilla</label>
                    <input type="text" name="upozilla" value="{{$marchents->upozilla}}" class="form-control">
                    @error('upozilla')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">District</label>
                    <input type="text" name="district" value="{{$marchents->district}}" class="form-control"> 
                    @error('district')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Division</label>
                    <input type="text" name="division" value="{{$marchents->division}}" class="form-control">
                    @error('division')
                    <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <input type="submit" value="Update" class="btn btn-success form-control">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection