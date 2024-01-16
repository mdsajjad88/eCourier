@extends('manager.managerhome')
@section('title', 'All Received Parcel')

@section('subsection')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
           <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>Parcel ID</th>
                    <th>Receiver Name</th>
                    <th>Receiver Contact</th>
                    <th>Parcel COD</th>
                    <th>Delivery District</th>
                    <th colspan="2">Action</th>

                </tr>
                @foreach($received as $prcl)
                <tr>
                    <td>{{$prcl->id}}</td>
                    <td>{{$prcl->name}}</td>
                    <td>{{$prcl->contact}}</td>
                    <td>{{$prcl->cod}}</td>
                    <td>{{$prcl->district}}</td>
                    <td><a href="{{url('sendanother/'.$prcl->id)}}" class="btn btn-primary">Send Another Location</a></td>
                    <td><a href="{{url('deliveryassign/'.$prcl->id)}}" class="btn btn-success">Rider Assign</a></td>
                </tr>
                @endforeach
            </thead>
           </table>
        </div>
    </div>
</div>
@endsection