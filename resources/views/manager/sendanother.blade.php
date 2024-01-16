@extends('manager.managerhome')
@section('title', 'Send Another Location')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <form action="{{url('anotherloca')}}" method="post">
                @csrf
                @foreach($myparcel as $parcel)
                <div class="row mt-2">
                   <div class="col-6"><label for="">Parcel ID</label></div>
                   <div class="col-6">
                    <select name="parcel_id" class="form-control" id="">
                        <option value="{{$parcel->id}}">{{$parcel->id}}</option>
                    </select>
                   </div>
                </div>
                <div class="row mt-2">
                   <div class="col-6"><label for="">Receiver Name</label></div>

                   <div class="col-6">
                    <select name="name" class="form-control" id="">
                        <option value="{{$parcel->name}}">{{$parcel->name}}</option>
                    </select>
                   </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="">Address</label>
                    </div>
                    <div class="col-6"><select name="address" id="" class="form-control">
                        <option value="{{$parcel->address}}" selected >{{$parcel->address}}</option>
                    </select>
                </div>
                <div class="row mt-2">
                   <div class="col-6">
                    Select Sending Location
                   </div>
                   <div class="col-6">
                    <select name="bname" id="" class="form-control">
                        <option value="">Select Parcel Sending Location</option>
                        @php 
                        $branch = DB::table('branches')->get();
                        @endphp
                        @foreach($branch as $mybranch)
                        <option value="{{$mybranch->bname}}" >{{$mybranch->bname}}</option>
                        @endforeach
                    </select>
                   </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <a href="{{url('allreceived')}}" class="btn btn-primary form-control"> Back</a>
                    </div>
                    <div class="col-6">
                    <input type="submit" name="submit" value="submit" class="btn btn-success mt-2 form-control">

                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection