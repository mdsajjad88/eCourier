@extends('manager.managerhome')
@section('title', 'Pickup Request')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <table style="width: 100%;text-align:center" class="table table-striped">
                <thead>
                   <tr>
                   <th> Marchernt ID</th>
                    <th> Location </th>
                    <th> Marchent Contact </th>
                    <th colspan="2">Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($pickup as $pickme)
                    <tr>
                        <td>{{$pickme->user_id }}</td>
                        <td>{{$pickme->local_address}} </td>
                        <td>{{$pickme->primary_num }}</td>
                        <td><a href="{{url('riderassign/'.$pickme->user_id)}}" class="btn btn-success">Rider Assign</a></td>

                        <td ><a class="btn btn-danger" href="{{url('pickupdelete/'.$pickme->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection