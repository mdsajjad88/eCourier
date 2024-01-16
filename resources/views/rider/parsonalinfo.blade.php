@extends('rider.home')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center"> {{Auth::guard('rider')->user()->name}} Personal Information </h2><hr>
        </div>
    </div>
    <div class="row">
            <table class="table table-striped">
                    <th>Rider ID</th>
                    <td class="form-control">{{$infos->id}}</td>
      
                </tr>
                <tr>
                    <th>Rider Name</th>
                    <td><input type="text"  class="form-control" value="{{$infos->name}}"></td>
                </tr>
                <tr>
                    <th>Rider Email</th>
                    <td><input type="text" class="form-control" value="{{$infos->email}}"></td>
                </tr>
                <tr>
                    <th>Rider Contact</th>
                    <td><input type="text" class="form-control" value="{{$infos->contact}}"></td>
                </tr>
                <tr>
                    <th>Branch Name</th>
                    <td><input type="text" class="form-control" value="{{$infos->branch}}"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
