@extends('manager.managerhome')
@section('title', 'Pending Marchent')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <table style="width: 100%; text-align:center" class="table table-striped">
                <tr>
                    <th>Marchent ID </th>
                    <th>Contact No </th>
                    <th>Local Address</th>
                    <th> Upozilla</th>
                   
                    <th colspan="2">Action</th>
                </tr>
                @foreach($pending as $marchent)
                <tr>
                    <td>{{$marchent->user_id}}</td>
                    <td>{{$marchent->primary_num}}</td>
                    <td>{{$marchent->local_address}}</td>
                    <td>{{$marchent->upozilla}}</td>
                    
                    <td><a href="{{url('marchent/delete/'.$marchent->user_id)}}" class="btn btn-danger">Delete</a></td>
                    <td><a href="{{url('marchent/accept/'.$marchent->user_id)}}" class="btn btn-success">Accept</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection