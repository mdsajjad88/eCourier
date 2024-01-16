@extends('admin.home')
@section('title', 'All Parcel')
@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Total Parcel History</h2> <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped"> 
                <tr>
                    <th>Parcel ID</th>
                    <th>Marchent ID</th>
                    <th>Delivery Address</th>
                    <th>Parcel COD</th>
                    <th>Status</th>
                </tr>
                @foreach($allparcel as $parcel)
                <tr>
                   <td>{{ $parcel->id}}</td>
                   <td>{{ $parcel->user_id}}</td>
                   <td>{{ $parcel->address}}</td>
                   <td>{{ $parcel->cod}}</td>
                   <td><p class="btn btn-primary">{{ $parcel->status}}</p></td>                 
                </tr>
                @endforeach
            </table>
            {{$allparcel->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection
