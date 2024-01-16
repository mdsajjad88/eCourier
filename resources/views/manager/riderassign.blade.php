@extends('manager.managerhome')
@section('title', 'Rider Assign')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="{{url('assignaction')}}" method="post">
                @csrf
                <div class="row mt-2">
                    <div class="col">
                        @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label for="">Select Rider</label>
                            <select name="riderid" id="" class="form-control">
                                <option value="">Select Rider</option>
                                @php
                                $manager = Auth::guard('manager')->user()->branch_name;
                                $rider = DB::table('riders')->where('branch', $manager)->get();
                                @endphp
                                @foreach($rider as $myrider)
                                <option value="{{$myrider->id}}">{{$myrider->name}}</option>
                                @endforeach
                            </select>
                            @error('riderid')
                            <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="">Marchent ID</label>
                            <select name="userid" id="" class="form-control">
                                <option value="{{$id}}" selected>{{$id}}</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <input type="submit" class="form-control btn btn-primary" value="Assign">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection