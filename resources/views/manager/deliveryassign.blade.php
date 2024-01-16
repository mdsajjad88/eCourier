@extends('manager.managerhome')
@section('title', 'Rider Assign')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <form action="{{url('deliriderassign')}}" method="post">
                @csrf
                @foreach($myparcel as $parcel)
                <div class="row">
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
                    <select name="user_id" class="form-control" id="">
                        <option value="{{$parcel->user_id}}">{{$parcel->name}}</option>
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
                </div>
                <div class="row mt-2">
                   <div class="col-6">
                 <label for="">   Select Rider</label>
                   </div>
                   <div class="col-6">
                            <select name="ridername" id="" class="form-control">
                                <option value="">Select Rider</option>
                                @php
                                $manager = Auth::guard('manager')->user()->branch_name;
                                $rider = DB::table('riders')->where('branch', $manager)->get();
                                @endphp
                                @foreach($rider as $myrider)
                                <option value="{{$myrider->id}}">{{$myrider->name}}</option>
                                @endforeach
                            </select>
                            @error('ridername')
                            <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                      
                   </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <a href="{{url('allreceived')}}" class="btn btn-primary form-control"> Back</a>
                    </div>
                    <div class="col-6">
                    <input type="submit" name="submit" value="Assign Rider" class="btn btn-success mt-2 form-control">
                    </div>
                   
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection