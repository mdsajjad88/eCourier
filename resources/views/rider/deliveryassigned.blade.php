@extends('rider.home')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Parcel ID</th>
                        <th>Receiver name </th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>COD</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($parcel as $myparcel)
                    <tr>
                        <td>{{$myparcel->id}}</td>
                        <td>{{$myparcel->name}}</td>
                        <td>{{$myparcel->address}}</td>
                        <td>{{$myparcel->contact}}</td>
                        <td>{{$myparcel->cod}}</td>
                        <td><a href="{{url('deliverydone/'.$myparcel->id)}}" class="btn btn-success">Delivery Done</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection