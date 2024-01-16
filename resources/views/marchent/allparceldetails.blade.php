@extends('home')
@section('title', 'All Parcel Details')

@section('subsection')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">All Parcel Details</h2> <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table style="width: 100%;" class="table table-striped">
                <tr>
                    <th>Parcel ID</th>
                    <th>Parcel COD</th>
                    <th>Receiver Name</th>
                    <th>Delivery Address</th>
                    <th>Status</th>
                </tr>
                @foreach($allparcel as $parcel)
                <tr>
                    <td>{{$parcel->id}} </td>
                    <td>{{$parcel->cod}} </td>
                    <td>{{$parcel->name}} </td>
                    <td>{{$parcel->address}} </td>
                    <td> <p class="btn btn-success">{{$parcel->status}}  </p> </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
{{$allparcel->links('pagination::bootstrap-4')}}
@endsection