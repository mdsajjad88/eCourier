@extends('rider.home')
@section('title', 'show all riqu');
@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        </div>
    </div>
    <div class="row">
       <div class="col">
        
        <table class="table table-striped">
            <tr>
                <th>Marchent ID</th>
                <th>Address</th>
                <th>Contact</th>
                <th> Action</th>
            </tr>
            @foreach($all as $pdetails)
            <tr>
                <td>{{$pdetails->user_id}}</td>
                <td>{{$pdetails->local_address}}</td>
                <td>{{$pdetails->primary_num}}</td>
                <td><a href="{{url('pickdone/'.$pdetails->user_id)}}" class="btn btn-success">Done</a></td>
               
            </tr>
            @endforeach
        </table>
       </div>
    </div>
</div>
@endsection